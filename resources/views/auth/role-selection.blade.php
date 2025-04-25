<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Selection</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e7b754 0%, #fbf7ef 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .role-selection-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        .left-section {
            background-color: #d0a039;
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex: 1;
        }

        .left-section h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .left-section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .btn-role {
            background: linear-gradient(90deg, #a26bfa 0%, #8347cc 100%);
            border: none;
            border-radius: 8px;
            padding: 15px 20px;
            font-size: 1.2rem;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .btn-role:hover {
            background: linear-gradient(90deg, #8347cc 0%, #6e36b5 100%);
            transform: scale(1.05);
        }

        .right-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .right-section img {
            width: 100%;
            height: auto;
            border-radius: 0;
            object-fit: cover;
        }

        .already-account {
            margin-top: 20px;
            font-size: 1rem;
        }

        .already-account a {
            color: #a26bfa;
            font-weight: bold;
            text-decoration: none;
        }

        .already-account a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="role-selection-card">
        <!-- Left Section -->
        <div class="left-section">
            <h2>Register As</h2>
            <p>Choose your role to get started</p>

            <div class="d-grid gap-3 w-100">
                <a href="{{ route('register.client') }}" class="btn btn-role">Client</a>
                <a href="{{ route('register.provider') }}" class="btn btn-role">Service Provider</a>
            </div>

            <div class="already-account">
                <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
            </div>
        </div>

        <!-- Right Section -->
        <div class="right-section">
            <img src="{{ asset('images/service1.jpeg') }}" alt="Service Image">
        </div>
    </div>
</body>
</html>