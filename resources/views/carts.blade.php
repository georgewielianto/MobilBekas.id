<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Your Cart</h1>
        @if($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalPrice = 0; @endphp
                    @foreach($cartItems as $cartItem)
                        @php $itemTotal = $cartItem->product->price * $cartItem->quantity; @endphp
                        @php $totalPrice += $itemTotal; @endphp
                        <tr>
                            <td><img src="{{ asset('images/' . $cartItem->product->image) }}" alt="{{ $cartItem->product->name }}" width="100"></td>
                            <td>{{ $cartItem->product->name }}</td>
                            <td>Rp{{ number_format($cartItem->product->price, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.update', $cartItem->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1" class="form-control d-inline w-50">
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </form>
                            </td>
                            <td>Rp{{ number_format($itemTotal, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-end"><strong>Total</strong></td>
                        <td colspan="2"><strong>Rp{{ number_format($totalPrice, 0, ',', '.') }}</strong></td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('checkout') }}" class="btn btn-success">Proceed to Checkout</a>
        @endif
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
