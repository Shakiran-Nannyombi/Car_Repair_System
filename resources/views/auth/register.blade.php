<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ✅ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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

        .card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #d0a039;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .card-header img {
            width: 80px;
            height: auto;
            margin-bottom: 10px;
        }

        .form-label {
            color: #6f5315;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #d0a039;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #b38a2e;
        }

        .form-control, .form-select {
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- Card Header with Logo -->
                    <div class="card-header">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo">
                        <h4 class="mb-0">Client Registration</h4>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('register.client') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" name="name" value="{{ old('name') }}" required autofocus class="form-control" />
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" name="email" value="{{ old('email') }}" type="email" required class="form-control" />
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" name="password" type="password" required class="form-control" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" required class="form-control" />
                            </div>

                            <!-- Vehicle Type -->
                            <div class="mb-3">
                                <label for="vehicle_type" class="form-label">Vehicle Type</label>
                                <input id="vehicle_type" name="vehicle_type" required class="form-control" />
                            </div>

                            <!-- Vehicle Registration Number -->
                            <div class="mb-3">
                                <label for="vehicle_registration_number" class="form-label">Vehicle Registration Number</label>
                                <input id="vehicle_registration_number" name="vehicle_registration_number" required class="form-control" />
                            </div>

                            <!-- Gender -->
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select id="gender" name="gender" required class="form-select">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>

                            <!-- Profile Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Profile Image</label>
                                <input id="image" type="file" name="image" accept="image/*" class="form-control" />
                            </div>

                            <!-- Location -->
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input id="location" name="location" required class="form-control" />
                            </div>

                            <!-- Register Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary mt-3">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
