<?php
require_once '../includes/auth.php';

// Restrict access to clients
restrictTo(['clients']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/common_dashboard.css">
</head>
<body>
    <!-- Sidebar -->
    <?php include('includes/side-nav.php'); ?>
    <!-- Header -->
    <?php include('includes/header.php'); ?>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- Messages Section -->
            <div class="messages-section mt-4">
                <h4>Messages</h4>
                <div class="messages-container mt-3">
                    <!-- Example Message -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Message Subject</h5>
                            <p class="card-text text-muted">
                                Received on: <span class="text-dark">December 15, 2024</span>
                            </p>
                            <p class="card-text">This is the content of the message. It may contain updates or responses from the backend system.</p>

                            <!-- Reply Section -->
                            <button class="btn btn-link text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#reply1" aria-expanded="false" aria-controls="reply1">
                                <i class="fa fa-reply"></i> Reply
                            </button>
                            <div class="collapse mt-3" id="reply1">
                                <form>
                                    <textarea class="form-control mb-2" rows="3" placeholder="Type your response here..." required></textarea>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"></i> Send</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Add more messages here dynamically -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Another Message</h5>
                            <p class="card-text text-muted">
                                Received on: <span class="text-dark">December 14, 2024</span>
                            </p>
                            <p class="card-text">Additional content for another example message. This text could also include attachments or links.</p>

                            <!-- Reply Section -->
                            <button class="btn btn-link text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#reply2" aria-expanded="false" aria-controls="reply2">
                                <i class="fa fa-reply"></i> Reply
                            </button>
                            <div class="collapse mt-3" id="reply2">
                                <form>
                                    <textarea class="form-control mb-2" rows="3" placeholder="Type your response here..." required></textarea>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"></i> Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
