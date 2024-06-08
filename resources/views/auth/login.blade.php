<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - MobilBekas.id</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <style>
        .logo-img {
            width: 150px; 
            display: block; 
            margin: 0 auto; 
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
            <img src="images/logo.png" alt="MobilBekas.id Logo" class="logo-img">
                <div class="text-center mb-4">
                    <h2>Welcome to MobilBekas.id!</h2>
                    </div>
                    
                <div class="card">
                    <div class="card-header text-center">{{ __('Login') }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <button type="button" class="btn btn-outline-secondary toggle-password" onclick="togglePassword('password')">👁️</button>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </form>
                        <div class="text-center mt-3">
                            <a href="{{ route('register') }}">{{ __("Don't have an account? Register") }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function togglePassword(inputId) {
        var input = document.getElementById(inputId);
        var button = document.querySelector('[onclick="togglePassword(\'' + inputId + '\')"]');
        if (input.type === "password") {
            input.type = "text";
            button.innerHTML = "👁️";
        } else {
            input.type = "password";
            button.innerHTML = "👁️";
        }
    }
</script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
