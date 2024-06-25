<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MobilBekas.id</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="images/logo.png" />

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">

            <img src="images/logo.png" alt="MobilBekas.id Logo" class="logo-img">
            <a class="navbar-brand" href="#" data-bs-toggle="modal" data-bs-target="#aboutModal">MobilBekas.id</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="FAQ">FaQ</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" id="carsLink" href="cars">Cars</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" id="sparepartsLink" href="spareparts">SpareParts</a></li>
                        </ul>
                    </li>


                </ul>
                <form action="{{ route('search') }}" method="GET" class="d-flex me-auto">
                    <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                <div class="d-flex align-items-center">
                    <div class="dropdown me-2"> <!-- Dropdown username -->
                        @if(Auth::check())
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, {{ Auth::user()->name }} !
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item logout-link">Logout</button>
                                </form>
                            </li>
                        </ul>
                        @endif
                    </div>

                    <!-- Tombol Admin Page -->
                    @if(Auth::check() && Auth::user()->is_admin)
                    <a href="{{ route('admin') }}" class="btn btn-secondary me-2">Admin Page</a>
                    @endif

                    <!-- Tombol Login dan Register -->
                    @if(!Auth::check())
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary me-2">Register</a>
                    @endif

                    <!-- Tombol View Cart -->
                    <a href="{{ url('/carts') }}" class="btn btn-outline-dark">
                        <i class="bi-cart-fill me-1"></i>
                        View Cart
                    </a>
                </div>

            </div>
        </div>
    </nav>





    <!-- Carousel -->
    <div id="headerCarousel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">

            <div class="carousel-item active">
                <header class="bg-primary py-5">
                    <div class="container px-4 px-lg-5 my-5">
                        <div class="text-center text-white">
                            <h1 class="display-4 fw-bolder">Welcome to MobilBekas.id!</h1>
                            <p class="lead fw-normal text-white-50 mb-0">Disini tempat untuk mencari mobil impian anda!!!</p>
                        </div>
                    </div>
                </header>
            </div>

            <div class="carousel-item">
                <header class="bg-dark py-5">
                    <div class="container px-4 px-lg-5 my-5">
                        <div class="text-center text-white">
                            <h1 class="display-4 fw-bolder"> PERINGATAN!!!</h1>
                            <p class="lead fw-normal text-white-50 mb-0">INI ADALAH WEBSITE UNTUK MEMPROMOSIKAN MITRA KAMI OTOMEN MOBILINDO,
                                Semua PEMBAYARAN di lakukan di tempat!!!.
                            </p>
                        </div>
                    </div>
                </header>
            </div>

            <div class="carousel-item">
                <header class="bg-success py-5">
                    <div class="container px-4 px-lg-5 my-5">
                        <div class="text-center text-white">
                            <h1 class="display-4 fw-bolder">Exclusive Offers</h1>
                            <p class="lead fw-normal text-white-50 mb-0">Don't miss out on great deals</p>
                        </div>
                    </div>
                </header>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#headerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#headerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>






    <!-- Section Cars-->
    <section id="cars" class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="text-center mb-4">Cars</h2>

            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($products as $product)
                <div class="col mb-5">
                    <div class="card h-100">

                        <!-- Product images-->
                        <div id="productCarousel{{ $product->id }}" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach(['image', 'image2', 'image3', 'image4'] as $key => $img)
                                @if($product->$img)
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                    <img class="d-block w-100" src="{{ asset('images/' . $product->$img) }}" alt="{{ $product->name }}" data-bs-toggle="modal-view" data-bs-target="#productImageViewModal" data-bs-image="{{ asset('images/' . $product->$img) }}">
                                </div>
                                @endif
                                @endforeach
                            </div>


                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel{{ $product->id }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel{{ $product->id }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>


                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $product->name }}</h5>

                                <!-- Product Description -->
                                <div class="mt-5 text-center"> <!-- Menambahkan kelas text-center di sini -->
                                    <h4>Car Description</h4>

                                    @foreach(explode("\n", $product->description) as $line)
                                    {{ $line }}
                                    @endforeach

                                </div>


                                <!-- Product price-->
                                <div class="mt-3 text-center">
                                    <h3>{{ 'Rp. ' . number_format($product->price, 2, ',', '.') }}</h3>
                                </div>

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
                                @if(Auth::check() && Auth::user()->is_admin)
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
    <section id="spareparts" class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="text-center mb-4">Spare Parts</h2>

            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($spareparts as $sparepart)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sparepart image-->
                        <img class="card-img-top" src="{{ asset('images/' . $sparepart->image) }}" alt="{{ $sparepart->name }}" data-bs-toggle="modal-view" data-bs-target="#productImageViewModal" data-bs-image="{{ asset('images/' . $sparepart->image) }}">


                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $sparepart->name }}</h5>
                                <p>{{ $sparepart->description }}</p>
                                <!-- Product price-->
                                <div class="mt-3 text-center">
                                    <h3>{{ 'Rp. ' . number_format($sparepart->price, 2, ',', '.') }}</h3>
                                </div>

                               
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

                                @if(Auth::check() && Auth::user()->is_admin)
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



    <!-- about us modal -->
    <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aboutModalLabel">About MobilBekas.id</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="images/otomen.jpeg" alt="Descriptive text about the image" class="modalImage">
                    <p>MobilBekas.id adalah website yang kami buat untuk mitra kami OTOMEN MOBILINDO.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Added to Cart -->
    <div class="modal fade" id="addedToCartModal" tabindex="-1" aria-labelledby="addedToCartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addedToCartModalLabel">Added to Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    The item has been added to your cart.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Already Added -->
    <div class="modal fade" id="alreadyAddedModal" tabindex="-1" aria-labelledby="alreadyAddedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="alreadyAddedModalLabel">Already Added!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-danger text-white">
                    This item is already added to the cart.
                </div>
                <div class="modal-footer bg-danger">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Already Added Spare-->
    <div class="modal fade" id="alreadyAddedModalSpare" tabindex="-1" aria-labelledby="alreadyAddedModalSpareLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="alreadyAddedModalSpareLabel">Already Added!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-danger text-white">
                    This item is already added to the cart.
                </div>
                <div class="modal-footer bg-danger">
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

    <!-- Modal Login Required -->
    <div class="modal fade" id="loginRequiredModal" tabindex="-1" aria-labelledby="loginRequiredModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginRequiredModalLabel">Login Required</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You have to login first to add items to your cart.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Login Required dropdown menu-->
    <div class="modal fade" id="loginRequiredMenuModal" tabindex="-1" aria-labelledby="loginRequiredMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginRequiredModalLabel">Login Required</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You have to login first to access this page.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Image Viewer -->
    <div class="modal fade" id="productImageViewModal" tabindex="-1" aria-labelledby="productImageViewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productImageViewModalLabel">Product Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="productImageModal" src="" class="img-fluid" alt="Product Image">
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footerContainer">
            <h2>We Accept</h2>
            <div class="bankImages">
                <img src="images/bank_bukopin.jpeg" alt="Bank Bukopin" class="bankImage">
                <img src="images/oto.jpeg" alt="OTO" class="bankImage">
                <img src="images/bca_finance.jpg" alt="BCA Finance" class="bankImage">
                <img src="images/indomobil.jpeg" alt="Indomobil" class="bankImage">
            </div>

            <div class="footerNav">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">News</a></li>
                    <li><a href="">About</a></li>
                </ul>
            </div>

            <div class="contactInfo">
                <p>Alamat: Green Garden Blok L 3 No. 22 Jakarta Barat</p>
                <p>Email: <a href="mailto:mensinanmen@gmail.com">mensinanmen@gmail.com</a></p>
            </div>
        </div>
        <div class="footerBottom">
            <p>Copyright &copy;2024; <span class="designer">MobilBekas.id</span></p>
        </div>
    </footer>



    <!-- Carousel js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- Custom JS to handle the add-to-cart logic -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productImageViewModal = new bootstrap.Modal(document.getElementById('productImageViewModal'));

            const carsLink = document.getElementById('carsLink');
            const sparepartsLink = document.getElementById('sparepartsLink');
            const forms = document.querySelectorAll('.add-to-cart-form');
            const alreadyAddedModal = new bootstrap.Modal(document.getElementById('alreadyAddedModal'));
            const addedToCartModal = new bootstrap.Modal(document.getElementById('addedToCartModal'));

            const formsSpare = document.querySelectorAll('.add-to-cart-form-spare');
            const alreadyAddedModalSpare = new bootstrap.Modal(document.getElementById('alreadyAddedModalSpare'));
            const loginRequiredModal = new bootstrap.Modal(document.getElementById('loginRequiredModal'));

            const loginRequiredMenuModal = new bootstrap.Modal(document.getElementById('loginRequiredMenuModal'));



            forms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const productId = this.querySelector('input[name="product_id"]').value;

                    const isLoggedIn = "{{ Auth::check() }}";

                    if (!isLoggedIn) {
                        loginRequiredModal.show();
                    } else {
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
                                    fetch(this.action, {
                                        method: this.method,
                                        body: new FormData(this),
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        }
                                    }).then(response => {
                                        if (response.ok) {
                                            addedToCartModal.show();
                                        } else {
                                            throw new Error('Network response was not ok');
                                        }
                                    }).catch(error => console.error('Error:', error));
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    }
                });
            });

            formsSpare.forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const sparepartId = this.querySelector('input[name="sparepart_id"]').value;

                    const isLoggedIn = "{{ Auth::check() }}";

                    if (!isLoggedIn) {
                        loginRequiredModal.show();
                    } else {
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
                                    fetch(this.action, {
                                        method: this.method,
                                        body: new FormData(this),
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        }
                                    }).then(response => {
                                        if (response.ok) {
                                            addedToCartModal.show();
                                        } else {
                                            throw new Error('Network response was not ok');
                                        }
                                    }).catch(error => console.error('Error:', error));
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    }
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

            function handleDropdownClick(event) {
                const isLoggedIn = "{{ Auth::check() }}";
                if (!isLoggedIn) {
                    event.preventDefault();
                    loginRequiredMenuModal.show();
                }
            }

            carsLink.addEventListener('click', handleDropdownClick);
            sparepartsLink.addEventListener('click', handleDropdownClick);

            // Handle click on product image to open modal
            const productImages = document.querySelectorAll('[data-bs-toggle="modal-view"]');
            productImages.forEach(img => {
                img.addEventListener('click', function() {
                    const imageSrc = this.getAttribute('data-bs-image');
                    const modalImage = document.getElementById('productImageModal');
                    modalImage.src = imageSrc;
                    productImageViewModal.show();
                });
            });

        });
    </script>





</body>

</html>