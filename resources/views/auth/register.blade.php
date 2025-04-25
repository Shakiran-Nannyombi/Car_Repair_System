<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ✅ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-primary">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Client Registration</h4>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('register.client') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <x-input-label for="name" value="Name" class="form-label" />
                                <x-text-input name="name" value="{{ old('name') }}" required autofocus class="form-control" />
                            </div>

                            <div class="mb-3">
                                <x-input-label for="email" value="Email" class="form-label" />
                                <x-text-input name="email" value="{{ old('email') }}" type="email" required class="form-control" />
                            </div>

                            <div class="mb-3">
                                <x-input-label for="password" value="Password" class="form-label" />
                                <x-text-input name="password" type="password" required class="form-control" />
                            </div>

                            <div class="mb-3">
                                <x-input-label for="password_confirmation" value="Confirm Password" class="form-label" />
                                <x-text-input name="password_confirmation" type="password" required class="form-control" />
                            </div>

                            <div class="mb-3">
                                <x-input-label for="vehicle_type" value="Vehicle Type" class="form-label" />
                                <x-text-input name="vehicle_type" required class="form-control" />
                            </div>

                            <div class="mb-3">
                                <x-input-label for="vehicle_registration_number" value="Vehicle Registration Number" class="form-label" />
                                <x-text-input name="vehicle_registration_number" required class="form-control" />
                            </div>

                            <div class="mb-3">
                                <x-input-label for="gender" value="Gender" class="form-label" />
                                <select name="gender" required class="form-select">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <x-input-label for="image" value="Profile Image" class="form-label" />
                                <input type="file" name="image" accept="image/*" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <x-input-label for="location" value="Location" class="form-label" />
                                <x-text-input name="location" required class="form-control" />
                            </div>

                            <div class="text-end">
                                <x-primary-button class="btn btn-primary mt-3">Register</x-primary-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
