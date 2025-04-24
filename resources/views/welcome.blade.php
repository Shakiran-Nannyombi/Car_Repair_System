<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Repair System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>

    <nav>
        <div class="logo">CAR REPAIR SYSTEM</div>
        <div class="nav-group">
            <ul class="navbar-nav flex-row">
                <li class="nav-item"><a class="btn btn-outline-light" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="btn btn-outline-light" href="{{ url('/about') }}">About</a></li>
                <li class="nav-item"><a class="btn btn-outline-light" href="{{ url('/services') }}">Services</a></li>
                <li  class="nav-item"><a class="btn btn-outline-light" href="{{ route('contact') }}">Contact Us</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="{{ url('/login') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-success">Register</a>
            </div>
        </div>
    </nav>

    <div class="hero" id="hero">
        <div class="overlay">
            <h1>Find the Best Repair Services</h1>
            <p>Reliable, fast, and affordable vehicle repair system for everyone.</p>
        </div>
    </div>

    <!-- Gallery Section (Replacing the existing Services section) -->
    <section id="services" class="bg-white">
        <div class="container">
            <h2 class="mb-4">Our Services</h2>
            <div class="gallery-container">
                <div class="gallery-item">
                    <img src="{{ asset('images/car2.jpeg') }}" alt="Car Service">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/service1.jpeg') }}" alt="Service 1">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/service2.jpeg') }}" alt="Service 2">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/oil.jpeg') }}" alt="Oil Change">
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white">
        &copy; {{ date('Y') }} Vehicle Repair System. All rights reserved.
    </footer>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const hero = document.getElementById('hero');
        const images = [
             "{{ asset('images/O.jpeg') }}",
            "{{ asset('images/back1.jpg') }}",
            "{{ asset('images/back2.jpg') }}",
            "{{ asset('images/back3.jpg') }}",
             "{{ asset('images/O.jpeg') }}"
        ];
        let index = 0;

        function changeHeroImage() {
           hero.style.backgroundImage = `url(${images[index]})`;
            index = (index + 1) % images.length;
        }

        setInterval(changeHeroImage, 4000);
        changeHeroImage();
    </script>
</body>
</html>