<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vehicle Repair System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            height: 100%;
            background-color: #f8f9fa;
        }

        nav {
            background-color: #e83e8c; /* Pink background for the navbar */
            display: flex;
            align-items: center;
            padding: 20px 60px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 10;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        nav .logo {
            font-size: 22px;
            font-weight: bold;
            color: white;
            margin-bottom: 10px;
        }

        nav .nav-group {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        nav ul {
            display: flex;
            gap: 10px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li a.btn {
            font-weight: 500;
        }

        nav .auth-buttons {
            display: flex;
            gap: 10px;
        }

        .hero {
            margin-top: 100px;
            height: 65vh;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            position: relative;
            transition: background-image 1s ease-in-out;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 40px;
            border-radius: 10px;
        }

        .overlay h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .overlay p {
            font-size: 1.2rem;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: #f5f5f5;
            margin-top: 40px;
        }

        section {
            padding: 60px 20px;
            text-align: center;
        }

        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
        }
        
        .gallery-item {
            width: 300px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: transform 0.3s ease;
        }
        
        .gallery-item:hover {
            transform: scale(1.05);
        }
        
        .gallery-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                align-items: flex-start;
            }

            nav .nav-group {
                flex-direction: column;
                align-items: flex-start;
                width: 100%;
            }

            nav ul {
                flex-direction: column;
                width: 100%;
            }

            nav .auth-buttons {
                flex-direction: column;
                width: 100%;
            }

            nav ul li a.btn,
            nav .auth-buttons a.btn {
                width: 100%;
            }
            
            .gallery-item {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <nav>
        <div class="logo">Vehicle Repair System</div>
        <div class="nav-group">
            <ul class="navbar-nav flex-row">
                <li class="nav-item"><a class="btn btn-outline-light" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="btn btn-outline-light" href="{{ url('/about') }}">About</a></li>
                <li class="nav-item"><a class="btn btn-outline-light" href="{{ url('/services') }}">Services</a></li>
                <a class="btn btn-outline-light" href="{{ route('contact') }}">Contact Us</a>
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
            "{{ asset('images/back1.jpg') }}",
            "{{ asset('images/back2.jpg') }}",
            "{{ asset('images/back3.jpg') }}",
            "{{ asset('images/back4.jpg') }}",
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