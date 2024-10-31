
<!-- resources/views/cart.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Here is the list of meals you've selected</h2>
        @if(session('cart') && count(session('cart')) > 0)
            @foreach(session('cart') as $index => $item)
                <div class="card mb-3">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h5>{{ $item['mealName'] }}</h5>
                            <p>Price: {{ number_format($item['price'], 2) }} TZS</p>
                        </div>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="index" value="{{ $index }}">
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p>Your cart is empty.</p>
        @endif
        <div class="text-center mt-4">
            <a href="order/confirm" class="btn btn-custom">Confirm Order</a>
        </div>
    </div>
@endsection
