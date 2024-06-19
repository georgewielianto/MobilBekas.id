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
             <!-- Name -->
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
    </div>

    <!-- Description -->
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
    </div>

    <!-- Price -->
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
    </div>

    <!-- Images -->
    <div class="form-group">
        <label for="image">Image 1</label>
        <input type="file" class="form-control-file" id="image" name="image">
        @if($product->image)
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail mt-2" width="150">
        @endif
    </div>

    <div class="form-group">
        <label for="image2">Image 2</label>
        <input type="file" class="form-control-file" id="image2" name="image2">
        @if($product->image2)
            <img src="{{ asset('images/' . $product->image2) }}" alt="{{ $product->name }}" class="img-thumbnail mt-2" width="150">
        @endif
    </div>

    <div class="form-group">
        <label for="image3">Image 3</label>
        <input type="file" class="form-control-file" id="image3" name="image3">
        @if($product->image3)
            <img src="{{ asset('images/' . $product->image3) }}" alt="{{ $product->name }}" class="img-thumbnail mt-2" width="150">
        @endif
    </div>

    <div class="form-group">
        <label for="image4">Image 4</label>
        <input type="file" class="form-control-file" id="image4" name="image4">
        @if($product->image4)
            <img src="{{ asset('images/' . $product->image4) }}" alt="{{ $product->name }}" class="img-thumbnail mt-2" width="150">
        @endif
    </div>

            <button type="submit" class="btn btn-primary">Update Car</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>
