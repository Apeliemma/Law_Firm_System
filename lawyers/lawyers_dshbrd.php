<?php
// Add any necessary PHP code here, such as session checks or fetching data
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyer Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="../css/common_dashboard.css">
    <!-- Custom dashboard style -->
    <style>
        .main-content {
            padding: 20px;
        }
        .card-stat {
            margin-bottom: 20px;
        }
        .card-stat .icon {
            font-size: 30px;
            color: white;
        }
        .card-stat .value {
            font-size: 24px;
            font-weight: bold;
        }
        .card-stat .label {
            font-size: 16px;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar a {
            color: white;
        }
        .sidebar {
            background-color: #2c3e50;
            color: white;
            height: 100vh;
            position: fixed;
            width: 250px;
        }
        .sidebar a {
            color: white;
            padding: 15px;
            text-decoration: none;
            display: block;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .sidebar .logo {
            text-align: center;
            padding: 20px;
            font-size: 24px;
        }
        .sidebar .logo img {
            max-width: 50%;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <?php include('includes/side-nav.php'); ?>

    <!-- Header -->
    <?php include('includes/header.php'); ?>

    <!-- Main Content -->
    <div class="main-content" style="margin-left: 250px; margin-top:60px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="card card-stat" style="background-color: #4CAF50;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="value">
                                    120
                                </div>
                            </div>
                            <div class="label">
                                Total Clients
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card card-stat" style="background-color: #FF9800;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="icon">
                                    <i class="fa fa-gavel"></i>
                                </div>
                                <div class="value">
                                    35
                                </div>
                            </div>
                            <div class="label">
                                Active Cases
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card card-stat" style="background-color: #2196F3;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="icon">
                                    <i class="fa fa-calendar-check"></i>
                                </div>
                                <div class="value">
                                    5
                                </div>
                            </div>
                            <div class="label">
                                Scheduled Appointments
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card card-stat" style="background-color: #9C27B0;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="icon">
                                    <i class="fa fa-comment-alt"></i>
                                </div>
                                <div class="value">
                                    10
                                </div>
                            </div>
                            <div class="label">
                                Unread Messages
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3>Welcome, Lawyer</h3>
            <p>Manage your cases and communicate with clients. Stay updated with your appointments and messages.</p>
        </div>
    </div>

    <!-- Bootstrap JavaScript and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
