<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - Vehicle Repair System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS and Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #fbf7ef;
    }

    .hero {
        background: url("{{ asset('images/contact-hero.jpeg') }}") no-repeat center center / cover;
        height: 50vh;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        text-align: center;
        position: relative;
    }

    .hero-overlay {
        background-color: rgba(0, 0, 0, 0.6);
        padding: 40px;
        border-radius: 10px;
    }

    .contact-container {
        padding: 60px 20px;
    }

    .contact-card {
        padding: 40px;
        border-radius: 12px;
        background-color: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .btn-custom {
        font-size: 1.1rem;
        font-weight: 500;
        padding: 15px;
        border-radius: 8px;
    }

    .btn-custom:hover {
        transform: scale(1.05);
        transition: transform 0.2s ease-in-out;
    }

    .navbar-custom {
        background-color: #d0a039;
    }

    .navbar-brand {
        color: #fff;
        font-weight: bold;
    }

    .navbar-brand:hover {
        color: #e2e6ea;
    }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Vehicle Repair System</a>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero">
    <div class="hero-overlay">
        <h1>Contact Us</h1>
        <p>We’re here to help! Reach out to us anytime.</p>
    </div>
</div>

<!-- Contact Section -->
<div class="container-fluid contact-container">
    <h2 class="text-center mb-4">Get in Touch</h2>
    <p class="text-center mb-5">Feel free to contact us through any of the channels below or fill out the form to send us a message directly.</p>

    <div class="row justify-content-center g-4">
        <div class="col-md-6 col-lg-4">
            <a href="https://wa.me/256757587161" target="_blank" class="btn btn-success btn-custom w-100">
                <i class="bi bi-whatsapp me-2"></i> WhatsApp
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <a href="https://www.instagram.com/gracejohnsondeogracious" target="_blank" class="btn btn-danger btn-custom w-100">
                <i class="bi bi-instagram me-2"></i> Instagram
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <a href="mailto:groupfmak@gmail.com" class="btn btn-dark btn-custom w-100">
                <i class="bi bi-envelope-fill me-2"></i> Email Us
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <a href="tel:+256757587161" class="btn btn-info text-white btn-custom w-100">
                <i class="bi bi-telephone-fill me-2"></i> Call Us
            </a>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="contact-card">
                <h3 class="text-center mb-4">Send Us a Message</h3>
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-custom w-100">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>