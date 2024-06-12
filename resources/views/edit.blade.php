<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Car</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
    
    

</head>

<body>
    <div class="container mt-5">
        <h2>Edit Car - MobilBekas.id</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Car Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Car Description</label>
                <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Car Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail mt-2" width="150">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Car</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>
