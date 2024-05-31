<!-- resources/views/product/show.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>{{ $product->name }}</h2>
        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
        <p>Price: Rp{{ $product->price }}</p>
        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
    </div>
</body>

</html>
