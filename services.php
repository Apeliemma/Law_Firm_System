<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Muthomi Maru Firm</title>
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
    <section class="hero-section bg-primary text-white py-5">
        <div class="container text-center">
            <h1 class="display-4 animate__animated animate__fadeIn">Our Services</h1>
            <p class="lead animate__animated animate__fadeIn animate__delay-1s">Legal Solutions Tailored to Your Needs</p>
        </div>
    </section>

    <!-- Services Overview Section -->
    <section id="services" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="animate__animated animate__fadeIn">What We Offer</h2>
                <p class="text-muted animate__animated animate__fadeIn animate__delay-1s">Comprehensive Legal Services to Help You Navigate Your Legal Needs with Confidence</p>
            </div>
            <div class="row g-4">
                <!-- Service 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box text-center p-4 shadow-sm rounded animate__animated animate__zoomIn">
                        <i class="fas fa-gavel fa-3x text-primary mb-3"></i>
                        <h4 class="mb-3">Corporate Law</h4>
                        <p>We provide expert guidance on corporate governance, compliance, mergers, acquisitions, and contracts.</p>
                    </div>
                </div>
                <!-- Service 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box text-center p-4 shadow-sm rounded animate__animated animate__zoomIn animate__delay-1s">
                        <i class="fas fa-handshake fa-3x text-warning mb-3"></i>
                        <h4 class="mb-3">Dispute Resolution</h4>
                        <p>Our team excels in resolving disputes through litigation, mediation, and arbitration to achieve fair outcomes.</p>
                    </div>
                </div>
                <!-- Service 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box text-center p-4 shadow-sm rounded animate__animated animate__zoomIn animate__delay-2s">
                        <i class="fas fa-balance-scale fa-3x text-success mb-3"></i>
                        <h4 class="mb-3">Property Law</h4>
                        <p>We offer comprehensive services for property transactions, lease agreements, and resolving property disputes.</p>
                    </div>
                </div>
                <!-- Service 4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box text-center p-4 shadow-sm rounded animate__animated animate__zoomIn animate__delay-3s">
                        <i class="fas fa-users fa-3x text-danger mb-3"></i>
                        <h4 class="mb-3">Family Law</h4>
                        <p>Providing legal support in divorce, child custody, alimony, and other family-related legal matters.</p>
                    </div>
                </div>
                <!-- Service 5 -->
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box text-center p-4 shadow-sm rounded animate__animated animate__zoomIn animate__delay-4s">
                        <i class="fas fa-briefcase fa-3x text-info mb-3"></i>
                        <h4 class="mb-3">Employment Law</h4>
                        <p>Helping businesses and employees with contracts, workplace disputes, and labor law compliance.</p>
                    </div>
                </div>
                <!-- Service 6 -->
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box text-center p-4 shadow-sm rounded animate__animated animate__zoomIn animate__delay-5s">
                        <i class="fas fa-lock fa-3x text-dark mb-3"></i>
                        <h4 class="mb-3">Intellectual Property</h4>
                        <p>We assist with trademarks, copyrights, patents, and other intellectual property issues to protect your creations.</p>
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
