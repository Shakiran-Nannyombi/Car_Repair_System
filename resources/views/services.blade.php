<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Services - Vehicle Repair System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
</head>
<body>

    <header>
        <h1>Our Services</h1>
        <p>Explore the full range of what we offer to keep your vehicle in top condition</p>
    </header>

    <!-- Car Deals Section -->
    <section>
        <h2>Car Deals</h2>
        <p>Get exclusive deals on car repairs, servicing packages, and spare parts. We work with trusted suppliers to give you the best offers.</p>
        <div class="images-row">
            <div class="car-item">
                <img src="images/car1.jpeg" alt="Car Deal 1">
                <p>Price: $8000</p>
            </div>
            <div class="car-item">
                <img src="images/car5.jpeg" alt="Car Deal 2">
                <p>Price: $9000</p>
            </div>
            <div class="car-item">
                <img src="images/car4.jpeg" alt="Car Deal 3">
                <p>Price: $10000</p>
            </div>
        </div>
    </section>

    <!-- Services Offered Section -->
    <section>
        <h2>Services Offered</h2>

        <div style="margin-bottom: 40px;">
            <h3>Routine Maintenance</h3>
            <p>Includes checking essential components like fluids, brakes, lights, and tires to keep your vehicle running smoothly.</p>
            <div class="images-row">
                <img src="images/maintenance2.jpeg" alt="Maintenance 1">
                <img src="images/maintenance.jpeg" alt="Maintenance 2">
                <img src="images/maintenance4.jpeg" alt="Maintenance 3">
            </div>
        </div>

        <div style="margin-bottom: 40px;">
            <h3>Vehicle Diagnostics</h3>
            <p>We use advanced tools to identify issues in your vehicle quickly and accurately.</p>
            <div class="images-row">
                <img src="images/diagnostic1.jpeg" alt="Diagnostics 1">
                <img src="images/diagnostic2.jpeg" alt="Diagnostics 2">
                <img src="images/diagnostic.jpeg" alt="Diagnostics 3">
            </div>
        </div>

        <div style="margin-bottom: 40px;">
            <h3>Brake & Engine Repair</h3>
            <p>Expert repairs for your braking system and engine components to ensure your car's safety and performance.</p>
            <div class="images-row">
                <img src="images/repair.jpeg" alt="Repair 1">
                <img src="images/repair2.jpeg" alt="Repair 2">
                <img src="images/repair1.jpeg" alt="Repair 3">
            </div>
        </div>

        <div style="margin-bottom: 40px;">
            <h3>Oil Change & Tire Services</h3>
            <p>We provide quick oil changes and check your tires for alignment, rotation, and replacements.</p>
            <div class="images-row">
                <img src="images/oil1.jpeg" alt="Oil Change 1">
                <img src="images/oil.jpeg" alt="Tire Service 1">
                <img src="images/oil2.jpeg" alt="Tire Service 2">
            </div>
        </div>

        <div style="margin-bottom: 40px;">
            <h3>Emergency Roadside Assistance</h3>
            <p>24/7 support for towing, jump-starts, flat tires, and more when you need help on the road.</p>
            <div class="images-row">
                <img src="images/road.jpeg" alt="Roadside Help 1">
                <img src="images/road1.jpeg" alt="Roadside Help 2">
                <img src="images/road2.jpeg" alt="Roadside Help 3">
            </div>
        </div>

        <div style="margin-bottom: 40px;">
            <h3>Spare Parts Delivery</h3>
            <p>Fast and reliable delivery of genuine spare parts for your vehicle model.</p>
            <div class="images-row">
                <img src="images/spare.jpeg" alt="Parts Delivery 1">
                <img src="images/spare1.jpeg" alt="Parts Delivery 2">
                <img src="images/spare2.jpeg" alt="Parts Delivery 3">
            </div>
        </div>
    </section>

    <!-- Advice to Car Owners -->
    <section>
        <h2>Advice to Car Owners</h2>
        <p>Here are some tips to keep your car in good condition:</p>
        <ul>
            <li>Regularly check oil and fluid levels</li>
            <li>Keep tires inflated to the correct pressure</li>
            <li>Don’t ignore unusual sounds or dashboard warnings</li>
            <li>Schedule regular checkups with professionals</li>
            <li>Clean your car regularly to avoid rust and wear</li>
        </ul>
        <div class="images-row">
            <img src="images/tip.jpeg" alt="Car Care Tip 1">
            <img src="images/tip1.jpeg" alt="Car Care Tip 2">
            <img src="images/tip2.jpeg" alt="Car Care Tip 3">
        </div>
    </section>

    <footer>
        &copy; {{ date('Y') }} Car Repair System. All rights reserved.
    </footer>

</body>
</html>