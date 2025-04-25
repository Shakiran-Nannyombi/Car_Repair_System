<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Vehicle Repair System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e7b754 0%, #fbf7ef 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-container {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            max-width: 900px;
            width: 100%;
            flex-wrap: wrap;
        }

        .login-form-section {
            padding: 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-image-section {
            background: linear-gradient(135deg, #d0a039 0%, #e7b754 100%);
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0; /* Remove padding to allow the image to fill the section */
            overflow: hidden; /* Ensure no overflow */
        }

        .login-image-wrapper {
            width: 100%;
            height: 100%;
            border-radius: 0; /* Remove border-radius to make the image fill the section */
            overflow: hidden;
        }

        .login-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure the image covers the entire section */
        }

        .login-heading {
            color: #6f5315;
            font-weight: 700;
            text-align: left;
            margin-bottom: 25px;
            font-size: 2.2rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #ced4da;
            margin-bottom: 15px;
            font-size: 1rem;
        }

        .form-label {
            color: #d0a039;
            font-weight: 600;
            margin-bottom: 5px;
            display: block;
        }

        .btn-login {
            background-color: #d0a039;
            border: none;
            border-radius: 8px;
            padding: 12px 20px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 1rem;
        }

        .btn-login:hover {
            background-color: #b38a2e;
        }

        .form-check-label {
            color: #6c757d;
        }

        .forgot-password {
            color: #d0a039;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .social-login {
            margin-top: 25px;
            text-align: center;
        }

        .social-login a {
            display: inline-block;
            margin: 0 10px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .social-login a:hover {
            opacity: 1;
        }

        .social-icon {
            width: 24px;
            height: 24px;
            vertical-align: middle;
        }

        .input-error {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Login Form Section -->
        <div class="login-form-section">
            <h2 class="login-heading">Welcome Back</h2>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 input-error" />
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 input-error" />
                </div>

                <div class="mb-3 form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif

                    <button type="submit" class="btn btn-login">
                        Log in
                    </button>
                </div>
            </form>
        </div>

        <!-- Login Image Section -->
        <div class="login-image-section">
            <div class="login-image-wrapper">
                <img src="{{ asset('images/OIP.jpeg') }}" alt="Login Image">
            </div>
        </div>
    </div>
</body>
</html>