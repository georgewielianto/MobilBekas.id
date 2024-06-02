<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MobilBekas.id</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">MobilBekas.id</a>
            <!-- Nama User -->
            @if(Auth::check())
            <span class="navbar-text me-3">Hello, {{ Auth::user()->name }}!</span>
            @endif

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">All Products</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                        </ul>
                    </li>

                    @if(Auth::user()->is_admin)
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin') }}">Admin</a></li>
                    @endif
                </ul>

                @if(Auth::check())
                <form class="d-flex align-items-center" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-dark me-3 btn-logout" type="submit">
                        Logout
                    </button>
                </form>
                @endif

                <a href="{{ url('/carts') }}" class="btn btn-outline-dark">
                    <i class="bi-cart-fill me-1"></i>
                    View Cart
                </a>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
            </div>
        </div>
    </header>

    <!-- Section Cars-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="text-center mb-4">Cars</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                @foreach($products as $product)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" />

                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $product->name }}</h5>
                                <!-- Product price-->
                                {{ formatRupiah($product->price) }}

                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <form action="{{ route('addToCart', $product->id) }}" method="POST" class="add-to-cart-form">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-outline-dark mt-auto">Add to cart</button>
                                </form>

                                @if(Auth::user()->is_admin)
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger mt-auto delete-button">Delete</button>
                                </form>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-primary mt-auto">Edit</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>



    <!-- Section Spare Parts-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="text-center mb-4">Spare Parts</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                @foreach($spareparts as $sparepart)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ asset('images/' . $sparepart->image) }}" alt="{{ $sparepart->name }}" />

                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $sparepart->name }}</h5>
                                <!-- Product price-->
                                {{ formatRupiah($sparepart->price) }}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">



                            <form action="{{ route('addToCartSparepart', $sparepart->id) }}" method="POST" class="add-to-cart-form-spare">
    @csrf
    <input type="hidden" name="sparepart_id" value="{{ $sparepart->id }}">
    <button type="submit" class="btn btn-outline-dark mt-auto">Add to cart</button>
</form>

                                @if(Auth::user()->is_admin)
                                <form action="{{ route('spareparts.destroy', $sparepart->id) }}" method="POST" class="delete-form d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger mt-auto delete-button">Delete</button>
                                </form>
                                <a href="{{ route('edit_spare', $sparepart->id) }}" class="btn btn-outline-primary mt-auto">Edit</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </section>

    <!-- Modal Already Added -->
    <div class="modal fade" id="alreadyAddedModal" tabindex="-1" aria-labelledby="alreadyAddedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alreadyAddedModalLabel">Already Added!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    This item is already added to the cart.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Already Added Spare-->
    <div class="modal fade" id="alreadyAddedModalSpare" tabindex="-1" aria-labelledby="alreadyAddedModalSpareLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alreadyAddedModalSpareLabel">Already Added!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    This item is already added to the cart.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal Success -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Spare part has been successfully deleted.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; MobilBekas.id 2024</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- Custom JS to handle the add-to-cart logic -->
    
        <script>
    document.addEventListener('DOMContentLoaded', function() {
        const forms = document.querySelectorAll('.add-to-cart-form');
        const alreadyAddedModal = new bootstrap.Modal(document.getElementById('alreadyAddedModal'));

        const formsSpare = document.querySelectorAll('.add-to-cart-form-spare');
    const alreadyAddedModalSpare = new bootstrap.Modal(document.getElementById('alreadyAddedModalSpare'));


        forms.forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const productId = this.querySelector('input[name="product_id"]').value;

                fetch('{{ route("carts.check") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        product_id: productId
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.exists) {
                        alreadyAddedModal.show();
                    } else {
                        this.submit();
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });

        formsSpare.forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const sparepartId = this.querySelector('input[name="sparepart_id"]').value;

            fetch('{{ route("carts.check_spare") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    sparepart_id: sparepartId
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.exists) {
                    alreadyAddedModalSpare.show();
                } else {
                    this.submit();
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const confirmation = confirm('Are you sure you want to delete this item?');
                if (confirmation) {
                    this.closest('form').submit();
                }
            });
        });
    });
</script>


    

</body>

</html>