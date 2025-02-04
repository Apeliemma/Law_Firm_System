<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Muthomi Maru Firm</title>
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
    <section class="hero-section bg-primary text-white py-5 text-center">
        <div class="container">
            <h1 class="display-4">About Us</h1>
            <p class="lead">Learn more about who we are, our mission, and how we serve our clients.</p>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Our Story</h2>
                <p class="text-muted">Discover the journey of Muthomi Maru Firm and our commitment to excellence.</p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 d-flex justify-content-center">
                    <img src="https://www.officelovin.com/wp-content/uploads/2020/05/private-law-office-austin-8.jpg" alt="Our Story" class="img-fluid rounded animate__animated animate__fadeInLeft" style="max-height: 400px; object-fit: cover;">
                </div>
                <div class="col-lg-6 d-flex align-items-center" style="height: 400px;">
                    <p class="m-0">
                        Founded in 2010, Muthomi Maru Firm has grown to become a leading legal practice in Kenya. 
                        Our dedicated team of professionals is committed to providing personalized legal solutions to our clients, 
                        helping them navigate complex challenges with confidence and expertise. 
                        Over the years, we've built a reputation for integrity, innovation, and client satisfaction.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission, Vision, and Values Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4">
                    <div class="icon-box animate__animated animate__zoomIn">
                        <i class="fas fa-bullseye fa-3x text-primary mb-3"></i>
                        <h4>Our Mission</h4>
                        <p>To provide exceptional legal services that empower our clients to achieve their goals.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon-box animate__animated animate__zoomIn animate__delay-1s">
                        <i class="fas fa-lightbulb fa-3x text-warning mb-3"></i>
                        <h4>Our Vision</h4>
                        <p>To be the most trusted and innovative legal firm in the region, renowned for our expertise and client-focused approach.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon-box animate__animated animate__zoomIn animate__delay-2s">
                        <i class="fas fa-handshake fa-3x text-success mb-3"></i>
                        <h4>Our Values</h4>
                        <p>Integrity, professionalism, and dedication form the foundation of everything we do.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Meet Our Team</h2>
                <p class="text-muted">A team of passionate professionals dedicated to your success.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="team-member text-center">
                        <img src="https://www.officelovin.com/wp-content/uploads/2020/05/private-law-office-austin-8.jpg" alt="Team Member 1" class="img-fluid rounded-circle mb-3" width="150">
                        <h5>John Muthomi</h5>
                        <p class="text-muted">Managing Partner</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-member text-center">
                        <img src="https://www.officelovin.com/wp-content/uploads/2020/05/private-law-office-austin-8.jpg" alt="Team Member 2" class="img-fluid rounded-circle mb-3" width="150">
                        <h5>Jane Maru</h5>
                        <p class="text-muted">Senior Counsel</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-member text-center">
                        <img src="https://www.officelovin.com/wp-content/uploads/2020/05/private-law-office-austin-8.jpg" alt="Team Member 3" class="img-fluid rounded-circle mb-3" width="150">
                        <h5>Paul Kimani</h5>
                        <p class="text-muted">Legal Associate</p>
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
