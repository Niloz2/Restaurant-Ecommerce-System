@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Checkout</h2>
        @if (session('cart') && count(session('cart')) > 0)
            <form action="{{ route('order.save') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div id="checkout-items">
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach (session('cart') as $item)
                        {{-- <div class="card mb-3">
                        <div class="card-body">
                            <h5>{{ $item['mealName'] }}</h5>
                            <p>Price: {{ number_format($item['price'], 2) }} TZS</p> --}}
                        @php
                            $totalPrice += $item['price'];
                        @endphp
                        {{-- </div>
                    </div> --}}
                    @endforeach
                    <div class="card">
                        <div class="card-body">
                            <h5>Total Price: {{ number_format($totalPrice, 2) }} TZS</h5>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">
                    {{-- @php
                        $order_id = "";
                    @endphp --}}
                    {{-- <input type="hidden#" name="order_id" value="{{ $order_id }}"> --}}
                    <button type="submit" class="btn btn-custom">Proceed to Checkout</button>
                </div>
            </form>
        @else
            <p>Your cart is empty.</p>
        @endif

    </div>
@endsection
