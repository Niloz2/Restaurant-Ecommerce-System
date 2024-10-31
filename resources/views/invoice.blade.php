<!-- resources/views/invoice.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>SelahKitchen | Invoice</title>
    <style>
        /* Add your styling here */
    </style>
</head>
<body>
    <h2>Invoice</h2>
    <p><strong>Name:</strong> {{ $order->name }}</p>
    <p><strong>Email:</strong> {{ $order->email }}</p>
    <p><strong>Phone:</strong> {{ $order->phone }}</p>

    <h3>Order Summary</h3>
    <ul>
        @foreach(json_decode($order->order_items, true) as $item)
            <li>{{ $item['mealName'] }} - {{ number_format($item['price'], 2) }} TZS</li>
        @endforeach
    </ul>
    <p><strong>Total Price:</strong> {{ number_format($order->total_price, 2) }} TZS</p>
</body>
</html>
