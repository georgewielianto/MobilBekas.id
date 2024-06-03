<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
}

form {
    margin-top: 20px;
}

form div {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

a {
    text-decoration: none;
    color: #007bff;
}

a:hover {
    text-decoration: underline;
}

.toggle-password {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
}
.password-container {
    position: relative;
}

.toggle-password {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
}
    </style>
</head>
<body>
    <h1>Profile Page</h1>
    <p>Welcome to your profile page, {{ Auth::user()->name }}.</p>

    <form action="{{ route('profile.update') }}" method="POST" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
        
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" >
        </div>
        
        <div class="password-container">
            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" >
            <span class="toggle-password" onclick="togglePassword('password')">👁️</span>
        </div>
        
        <div class="password-container">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" >
            <span class="toggle-password" onclick="togglePassword('password_confirmation')">👁️</span>
        </div>

        <button type="submit">Update Profile</button>
    </form>

    <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?')">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Account</button>
</form>


    <a href="{{ route('home') }}">Home</a> <!-- Tambahkan tombol Home -->

    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("password_confirmation").value;

            if (password != confirmPassword) {
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
