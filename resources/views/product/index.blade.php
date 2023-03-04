<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Index</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product['code'] }} - {{ $product['name'] }}</td>
                    <td>{{ number_format($product['price'], 2) }}</td>
                    <td>
                        <a href="{{ route('products.store', $product['code']) }}">
                            Add To Cart
                        </a
                    ></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <p><b>Cart</b> &nbsp; <a href="{{ route('products.index', ['carts' => 'clear']) }}">Clear Cart</a></p>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($checkout->carts as $code => $quantity)
                <tr>
                    <td>{{ $code }}</td>
                    <td>{{ $quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h4>Total : {{ number_format($checkout->total, 2) }}</h4>
</body>
</html>