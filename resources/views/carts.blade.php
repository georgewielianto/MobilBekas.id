<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh; /* Make sure the body stretches at least to the height of the viewport */
            position: relative;
        }

        .container {
            position: relative;
            z-index: 1;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .footer-placeholder {
            height: 60px;
        }
    </style>

</head>

<body>
    <div class="container mt-5 text-center">
        <h1 class="mb-4">Your Carts</h1>
        <p class="mb-4">MobilBekas.id</p>
    </div>

    <div class="container mt-5">



        <h1 class="mb-4">Car</h1>
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




    <!-- cart untuk sparepart -->
    <div class="container mt-5">
        <h1 class="mb-4">Sparepart</h1>
        @if($cartSpareparts->isEmpty())
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
                @foreach($cartSpareparts as $cartSparepart)
                @php $itemTotal = $cartSparepart->sparepart->price * $cartSparepart->quantity; @endphp
                @php $totalPrice += $itemTotal; @endphp
                <tr>
                    <td><img src="{{ asset('images/' . $cartSparepart->sparepart->image) }}" alt="{{ $cartSparepart->sparepart->name }}" width="100"></td>
                    <td>{{ $cartSparepart->sparepart->name }}</td>
                    <td>Rp{{ number_format($cartSparepart->sparepart->price, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('spareparts.cart.update', $cartSparepart->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" value="{{ $cartSparepart->quantity }}" min="1" class="form-control d-inline w-50">
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </form>
                    </td>
                    <td>Rp{{ number_format($itemTotal, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('spareparts.cart.remove', $cartSparepart->id) }}" method="POST" class="d-inline">
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

    <div class="container mt-5 text-center">
            <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
        </div>

        <div class="container mt-5">
    <h2>Total Price</h2>
    <p>Rp{{ number_format($totalPriceAll, 0, ',', '.') }}</p>
</div>

<footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; MobilBekas.id 2024</p>
        </div>
    </footer>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>