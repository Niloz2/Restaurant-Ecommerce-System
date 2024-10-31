<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function saveOrder( Request $request ) {
        // Validate input
        $request->validate( [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ] );

        // Generate unique order ID
        $phone = $request->phone;
        $now = microtime( true );
        $time = date( 'His', $now );
        $milliseconds = sprintf( '%03d', ( $now - floor( $now ) ) * 1000 );
        $order_id = $phone . $time . $milliseconds;

        // Save order to database
        $order = Order::create( [
            'name' => $request->name,
            'order_id' => $order_id, // Store the generated order ID
            'email' => $request->email,
            'phone' => $request->phone,
            'total_price' => $request->totalPrice,
            'order_items' => json_encode( session( 'cart' ) ),
        ] );
        
        // Collect order details for payment
        $orderData = [
            'amount' => $order->total_price,
            'currency' => 'TZS',
            'phone' => $order->phone,
            'description' => 'Order Payment',
            'order_id' => $order->order_id,
        ];

        // Store order data in session
        session( [ 'orderData' => $orderData ] );

        return view('checkout',['orderData'=>$orderData]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    
    public function generateInvoice( $orderId ) {
        $order = Order::findOrFail( $orderId );

        // Generate PDF invoice
        $pdf = PDF::loadView( 'invoice', compact( 'order' ) );

        return $pdf->download( 'invoice.pdf' );
    }
}





