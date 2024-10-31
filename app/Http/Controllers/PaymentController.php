<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Order;

class PaymentController extends Controller {

    public function processPayment(Request $request) {
        $orderSession = session('orderData');

        // Retrieve order_id from the session
        $order_id = $orderSession['order_id'] ?? null;
        $phone = $orderSession['phone'] ?? null;
        $amount = $orderSession['amount'] ?? null;

        // Validate the order_id
        if (!$order_id) {
            return back()->withErrors('Order ID is missing.');
        }

        // Fetch the order using where instead of findOrFail
        $order = Order::where('order_id', $order_id)->first();

        // Check if order exists
        if (!$order) {
            return back()->withErrors('Order not found.');
        }

        $client = new Client();
        try {
            // dd('Try block!');
            $response = $client->request('POST', env('AZAMPAY_API_URL') . '/payment', [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('AZAMPAY_CLIENT_SECRET'),
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'client_id' => env('AZAMPAY_CLIENT_ID'),
                    'amount' => $amount,
                    'currency' => 'TZS',
                    'order_id' => $order_id,
                    'callback_url' => route('payment.callback'),
                    // Additional fields as required by Azampay
                ]
            ]);

            $responseBody = json_decode($response->getBody(), true);

            // Check if payment_url exists
            if (isset($responseBody['payment_url'])) {
                // Redirect to the Azampay payment page
                return redirect($responseBody['payment_url']);
            } else {
            dd('Payment URL not received from Azampay.');
            return back()->withErrors('Payment URL not received from Azampay.');
            }
        } catch (\Exception $e) {
            // Log the exception and provide a user-friendly message
            dd('Payment processing error: ' . $e->getMessage());
            // return back()->withErrors('Payment processing failed. Please try again later.');
        }
    }

    public function paymentCallback(Request $request) {
        $status = $request->input('status');
        $order_id = $request->input('order_id');

        if ($status === 'success') {
            dd('Payment  succeeded!');
            return view('payment.success', ['order_id' => $order_id]);
        } else {
            dd('Payment  failed!');
            return view('payment.failed', ['order_id' => $order_id]);
        }
    }
}
