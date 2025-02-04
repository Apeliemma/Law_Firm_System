<?php
require_once '../includes/auth.php';
require_once '../includes/db_connect.php';

// Restrict access to clients
restrictTo(['clients']);

// Get the logged-in user's ID
$userId = $_SESSION['user_id']; 

// Fetch the user's cases from the database
$query = "SELECT c.id, c.case_title, s.specialization_name, c.created_at, c.status 
          FROM cases c 
          JOIN specializations s ON c.specialization_id = s.id
          WHERE c.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cases</title>
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
            <h3>My Cases</h3>
            <p>View the status of your submitted cases below.</p>
            <div class="table-responsive mt-4">
                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Case Title</th>
                            <th>Case Type</th>
                            <th>Submission Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Loop through the cases and display them
                        if ($result->num_rows > 0) {
                            while ($case = $result->fetch_assoc()) {
                                $caseId = $case['id'];
                                $caseTitle = $case['case_title'];
                                $caseType = $case['specialization_name'];
                                $submissionDate = $case['created_at'];
                                $status = $case['status'];
                                $statusClass = '';
                                $statusText = '';

                                // Determine the status badge color
                                switch ($status) {
                                    case 'Under Review':
                                        $statusClass = 'bg-warning text-dark';
                                        $statusText = 'Under Review';
                                        break;
                                    case 'Approved':
                                        $statusClass = 'bg-success';
                                        $statusText = 'Approved';
                                        break;
                                    case 'Declined':
                                        $statusClass = 'bg-danger';
                                        $statusText = 'Declined';
                                        break;
                                    default:
                                        $statusClass = 'bg-secondary';
                                        $statusText = 'Unknown';
                                        break;
                                }
                        ?>
                        <tr>
                            <td><?php echo $caseId; ?></td>
                            <td><?php echo $caseTitle; ?></td>
                            <td><?php echo $caseType; ?></td>
                            <td><?php echo $submissionDate; ?></td>
                            <td>
                                <span class="badge <?php echo $statusClass; ?>"><?php echo $statusText; ?></span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="window.location.href='view_case_details.php?case_id=<?php echo $caseId; ?>'">
                                    <i class="fa fa-eye"></i> View Details
                                </button>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No cases submitted yet.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
