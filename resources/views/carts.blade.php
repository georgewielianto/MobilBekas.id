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
            min-height: 100vh;
            position: relative;
        }

        .container {
            position: relative;
            z-index: 1;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
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
        @endif
    </div>

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
        @endif

        <div class="container mt-5">
            <h2>Total Price</h2>
            <p>Rp{{ number_format($totalPriceAll, 0, ',', '.') }}</p>
        </div>
    </div>

    <div class="container mt-5 text-center">
       <button id="checkoutButton" class="btn btn-success btn-proceed">Proceed to Checkout</button>
    </div>

    <div class="container mt-5 text-center">
    <a href="{{ route('home') }}" class="btn btn-primary btn-back">Back to Home</a>
    </div>
  



    <div class="container mt-5">
        <h2>Total Price</h2>
        <p>Rp{{ number_format($totalPriceAll, 0, ',', '.') }}</p>
    </div>

    ="{{ route('home') }}" class="btn btn-primary btn-back">Back to Home</a>
    </div>

    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; MobilBekas.id 2024</p>
        </div>
    </footer>





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            var successMessage = "{{ session('success') }}";
            if (successMessage) {
                alert(successMessage);
            }

            $('#checkoutButton').on('click', function(e) {
                e.preventDefault();
                if (confirm("Are you sure you want to proceed to checkout?")) {
                    alert("Congratulations, your checkout details will be received by the seller.\n \nFor further information contact (+62)821 8888 5688");
                    window.location.href = "{{ route('checkout') }}";
                }
            });
        });
    </script>
</body>

</html>