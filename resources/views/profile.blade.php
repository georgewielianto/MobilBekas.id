<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link href="css/profile.css" rel="stylesheet" />

    @if ($errors->has('name'))
        <script>
            alert("{{ $errors->first('name') }}");
        </script>
    @endif

</head>

<body>
  
        <h1>Profile Page</h1>
        <p>Welcome to your profile page, {{ Auth::user()->name }}.</p>

        <form action="{{ route('profile.update') }}" method="POST" onsubmit="return validateForm()">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}">
            </div>

            <div class="password-container">
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password">
                <span class="toggle-password" onclick="togglePassword('password')">👁️</span>
            </div>

            <div class="password-container">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
                <span class="toggle-password" onclick="togglePassword('password_confirmation')">👁️</span>
            </div>

            <button type="submit">Update Profile</button>
        </form>

        <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?')">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Account</button>
        </form>


        <button><a href="{{ route('home') }}">Home</a> </button>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; MobilBekas.id 2024</p>
            </div>
        </footer>

        <script>
            function validateForm() {
                var password = document.getElementById("password").value;
                var confirmPassword = document.getElementById("password_confirmation").value;

                if (password.length > 0 && password.length < 8) {
                    alert("The password field must be at least 8 characters.");
                    return false;
                }

                if (password !== confirmPassword) {
                    alert("New password didn't match.");
                    return false;
                }
                return true;
            }

            function togglePassword(inputId) {
                var input = document.getElementById(inputId);
                input.type = input.type === "password" ? "text" : "password";
            }
        </script>
    
</body>

</html>
