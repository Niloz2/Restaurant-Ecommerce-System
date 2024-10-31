<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $cart[] = [
            'mealName' => $request->mealName,
            'price' => $request->price,
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', $request->mealName . ' has been added to your cart.');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);

        unset($cart[$request->index]);

        session()->put('cart', array_values($cart));

        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}

?>