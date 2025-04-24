<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us - Vehicle Repair System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
</head>
<body>

<!-- Header -->
<div class="header-bg">
    <h1>About Car Repair System</h1>
    <p class="lead mt-3">Reliable, fast and trusted solutions for all your vehicle repair needs</p>
</div>

<!-- About Section -->
<div class="container py-5">
    <h2 class="text-center section-title">Who We Are</h2>
    <p class="lead text-center mb-5 px-md-5">
        We connect vehicle owners to skilled mechanics in real-time. Our system offers trusted, transparent, and efficient
        services to make your life easier. Whether it's a flat tire or a full engine overhaul – we've got your back.
    </p>

    <!-- Features with Images -->
    <div class="row text-center g-4 mb-5">
        <div class="col-md-4">
            <div class="feature-box">
            <img src="/images/repair4.jpeg" class="img-fluid mb-3" alt="Fast Service">
                <h5>Fast & Efficient Service</h5>
                <p>Connect to nearby experts instantly and reduce your downtime.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <img src="/images/repair6.jpeg" class="img-fluid mb-3" alt="Trusted Professionals">
                <h5>Trusted Professionals</h5>
                <p>All mechanics are vetted and rated by real customers like you.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <img src="images/repair5.jpeg" class="img-fluid mb-3" alt="24/7 Support">
                <h5>24/7 Customer Support</h5>
                <p>We're here for you anytime to ensure your issues are resolved on time.</p>
            </div>
        </div>
    </div>

    <!-- Why Choose Us -->
    <div class="text-center">
        <h3 class="section-title">Why Choose Us?</h3>
        <ul class="list-group list-group-flush w-75 mx-auto text-start">
            <li class="list-group-item">✔ Easy online booking for repairs and maintenance</li>
            <li class="list-group-item">✔ Real-time updates and service tracking</li>
            <li class="list-group-item">✔ Fair pricing with full transparency</li>
            <li class="list-group-item">✔ Safe and secure experience for customers</li>
            <li class="list-group-item">✔ Wide network of experienced mechanics</li>
        </ul>
    </div>
</div>

<!-- Footer -->
<footer>
    &copy; {{ date('Y') }} Car Repair System. All rights reserved.
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>