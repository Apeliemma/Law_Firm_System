<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Muthomi Maru Firm</title>
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
            <h1 class="display-4">Contact Us</h1>
            <p class="lead">We’re here to assist you with any legal matters. Get in touch today!</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Contact Form -->
                <div class="col-lg-6">
                    <h2 class="mb-4">Send Us a Message</h2>
                    <form action="process_contact.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Write your message here" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="col-lg-6">
                    <h2 class="mb-4">Our Contact Details</h2>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="fas fa-map-marker-alt fa-lg text-primary"></i>
                            <span class="ms-2">0954 Legal Lane, Nairobi, Kenya</span>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-phone-alt fa-lg text-primary"></i>
                            <span class="ms-2">+254 754 497 441</span>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-envelope fa-lg text-primary"></i>
                            <span class="ms-2">info@muthomimaru.com</span>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-clock fa-lg text-primary"></i>
                            <span class="ms-2">Mon - Fri: 9:00 AM - 5:00 PM</span>
                        </li>
                    </ul>
                    <h2 class="mb-4">Find Us</h2>
                    <div class="ratio ratio-16x9">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31631.123456789!2d36.821946456!3d-1.28638912345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x123456789abcd!2sYour+Firm+Location!5e0!3m2!1sen!2ske!4v123456789" 
                            allowfullscreen="" loading="lazy"></iframe>
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
