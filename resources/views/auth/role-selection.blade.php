<x-guest-layout>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #3273dc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-container {
            background-color: #4a89dc;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        .login-form-section {
            background-color: #3273dc;
            border-radius: 15px;
            padding: 40px;
            color: white;
        }
        .right-image-section {
            padding: 0;
        }
        .right-image-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
        }
        .btn-login {
            background: linear-gradient(90deg, #a26bfa 0%, #8347cc 100%);
            border: none;
            border-radius: 8px;
           
        }
        .btn-login:hover {
            background: linear-gradient(90deg, #8347cc 0%, #6e36b5 100%);
        }
        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #e0e0e0;
        }
        .register-title {
            color: black;
            font-weight: 600;
        }
        .login-link {
            color: #a26bfa;
        }
    </style>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-30">
                <div class="login-container">
                    <div class="row g-0">
                        <!-- Left side - Login Form -->
                        <div class="col-md-6">
                            <div class="login-form-section h-100 d-flex flex-column justify-content-center">
                                <h2 class="mb-4 text-center register-title">Register As</h2>
                                
                                <div class="d-grid gap-3 mb-4">
                                    <a href="{{ route('register.client') }}" class="btn btn-login btn-lg text-white fw-bold">Client</a>
                                    <a href="{{ route('register.provider') }}" class="btn btn-login btn-lg text-white fw-bold">Service Provider</a>
                                </div>
                                
                                <div class="text-center mt-4">
                                    <p class="text-white">Already have an account? <a href="{{ route('login') }}" class="login-link text-decoration-none">Sign in</a></p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right side - Image only, no text -->
                        <div class="col-md-6 d-none d-md-block right-image-section">
                            <!-- Replace the URL with your actual image path -->
                            <img src="{{ asset('images/service1.jpeg') }}" alt="Service 1">    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>