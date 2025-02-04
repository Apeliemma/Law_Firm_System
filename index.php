<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muthomi Maru Firm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <!-- Header -->
    <?php include('includes/header.php'); ?>
    <!-- Hero Section -->
    <section class="hero-section animate__animated animate__fadeIn">
        <div class="container">
            <h1 class="display-4">Welcome to Muthomi Maru Firm</h1>
            <p class="lead">Your Trusted Legal Partner for Excellence</p>
            <a href="#services" class="btn btn-primary btn-lg">Discover Our Expertise</a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5">
        <div class="container">
            <div class="text-center mb-5 animate__animated animate__fadeInUp">
                <h2>Our Services</h2>
                <p class="text-muted">Comprehensive Legal Solutions Tailored to Your Needs</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box animate__animated animate__zoomIn">
                        <i class="fas fa-gavel fa-3x text-primary mb-3"></i>
                        <h4>Corporate Law</h4>
                        <p>Providing expert guidance on corporate governance, compliance, and contracts.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box animate__animated animate__zoomIn animate__delay-1s">
                        <i class="fas fa-handshake fa-3x text-warning mb-3"></i>
                        <h4>Dispute Resolution</h4>
                        <p>Efficiently resolving disputes through arbitration, mediation, and litigation.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box animate__animated animate__zoomIn animate__delay-2s">
                        <i class="fas fa-balance-scale fa-3x text-success mb-3"></i>
                        <h4>Property Law</h4>
                        <p>Expert assistance in property transactions, lease agreements, and more.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Client Testimonials</h2>
                <p class="text-muted">What Our Clients Are Saying</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial animate__animated animate__fadeInLeft">
                        <p>"Muthomi Maru Firm's legal expertise gave us the confidence to grow our business."</p>
                        <h5>- Sarah W.</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial animate__animated animate__fadeInUp">
                        <p>"Their dedication to resolving our dispute was unparalleled."</p>
                        <h5>- James K.</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial animate__animated animate__fadeInRight">
                        <p>"The team’s professionalism and efficiency exceeded our expectations."</p>
                        <h5>- Anita M.</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include('includes/footer.php'); ?>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
