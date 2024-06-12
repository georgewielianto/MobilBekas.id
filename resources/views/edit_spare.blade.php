<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Spare Part - MobilBekas.id</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
        }

        .btn-cancel {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
    
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Spare Part</h1>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('spareparts.update', $sparepart->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $sparepart->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">SpareParts Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="{{ asset('images/' . $sparepart->image) }}" alt="{{ $sparepart->name }}" class="img-thumbnail mt-2" width="150">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $sparepart->price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Spare Part</button>
        </form>

        <a href="{{ route('home') }}" class="btn btn-cancel mt-3">Cancel</a>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>