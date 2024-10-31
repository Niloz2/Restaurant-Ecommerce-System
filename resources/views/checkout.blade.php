<!-- resources/views/checkout.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Congratuation You're about to get your gorgeous Meal!</h2>
        @if (session('cart') && count(session('cart')) > 0)
            <form action="{{ route('payment.process') }}" method="POST">

                <div id="checkout-items">
                    <div class="card">
                        <div class="card-body">
                            <h5>Total Price: {{ number_format($orderData['amount'], 2) }} TZS</h5>
                        </div>
                    </div>
                </div>
                @csrf
                {{-- <input type="hidden" name="totalPrice" value="{{ $orderData['amount'] }}"> --}}
                <input type="hidden" name="order_id" value="{{ $orderData['order_id'] }}">
                {{-- <input type="hidden" name="currency" value="{{ $orderData['currency'] }}">
                <input type="hidden" name="description" value="{{ $orderData['description'] }}"> --}}
                <div class="text-center mt-4">
                    <button class="btn btn-custom" type="submit">Make Payment</button>
                </div>
            </form>
        @else
            <p>Your cart is empty.</p>
        @endif

    </div>
@endsection
