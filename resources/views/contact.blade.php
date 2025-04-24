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
            background-color: #f8f9fa;
        }

        .contact-container {
            padding: 80px 20px 60px;
        }

        .contact-card {
            padding: 40px;
            border-radius: 12px;
            background-color: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .btn:hover {
            transform: scale(1.05);
            transition: transform 0.2s ease-in-out;
        }

        .navbar-custom {
            background-color: #007bff;
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

<!-- Contact Section -->
<div class="container contact-container">
    <h2 class="text-center mb-4">Contact Us</h2>
    <p class="text-center mb-5">Need help? Reach out to us via any of the channels below:</p>

    <div class="row justify-content-center g-4">
        <div class="col-md-6 col-lg-4">
            <a href="https://wa.me/256757587161" target="_blank" class="btn btn-success w-100 py-3">
                <i class="bi bi-whatsapp me-2"></i> WhatsApp
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <a href="https://www.instagram.com/gracejohnsondeogracious" target="_blank" class="btn btn-danger w-100 py-3">
                <i class="bi bi-instagram me-2"></i> Instagram
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <a href="mailto:groupfmak@gmail.com" class="btn btn-dark w-100 py-3">
                <i class="bi bi-envelope-fill me-2"></i> Email Us
            </a>
        </div>
        <div class="col-md-6 col-lg-4">
            <a href="tel:+256757587161" class="btn btn-info text-white w-100 py-3">
                <i class="bi bi-telephone-fill me-2"></i> Call Us
            </a>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>