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
            <h3>Welcome, <?php echo $_SESSION['user_name']; ?></h3>
            <p>Manage your cases and view updates.</p>

            <!-- Active Cases Section -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Active Cases</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Case Title</th>
                                <th>Case Type</th>
                                <th>Status</th>
                                <th>Last Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('../includes/db_connect.php');
                            $sql = "
                                SELECT c.case_title, 
                                    s.specialization_name AS case_type, 
                                    c.case_details AS status, 
                                    c.created_at AS last_updated 
                                FROM cases c
                                JOIN specializations s ON c.specialization_id = s.id
                            ";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>" . htmlspecialchars($row['case_title']) . "</td>
                                            <td>" . htmlspecialchars($row['case_type']) . "</td>
                                            <td><span class='badge bg-primary'>" . htmlspecialchars($row['status']) . "</span></td>
                                            <td>" . htmlspecialchars($row['last_updated']) . "</td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4' class='text-center'>No active cases found</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Notifications Section -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Notifications</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fa fa-bell"></i> Your case "Case 1" has been updated. Please review the latest status.
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-bell"></i> Document "Case 3 Document" is missing a description.
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-bell"></i> "Case 2" has been marked as resolved.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
