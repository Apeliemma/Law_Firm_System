<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Filed Cases</title>
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
            <h3>Filed Cases Management</h3>
            <div class="row mt-4">
                <div class="col-md-12">
                    <!-- Cases Table -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Filed Cases</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Case ID</th>
                                        <th>Client Name</th>
                                        <th>Status</th>
                                        <th>Documents</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <?php
                                // Database connection (using PDO for security)
                                $host = 'localhost';
                                $db = 'muthomi-firm';
                                $user = 'root';
                                $pass = '';

                                try {
                                    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
                                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                } catch (PDOException $e) {
                                    echo "Connection failed: " . $e->getMessage();
                                    exit;
                                }

                                // SQL query to join cases with clients
                                $query = "SELECT c.id AS case_id, c.status, cl.id AS client_id, cl.full_name AS client_name
                                        FROM cases c
                                        LEFT JOIN clients cl ON c.user_id = cl.id";

                                $stmt = $pdo->query($query);

                                // Check if there are any records
                                if ($stmt->rowCount() > 0) {
                                    $cases = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                } else {
                                    $cases = [];
                                }
                                ?>

                                <tbody>
                                    <?php
                                    // Loop through the fetched cases and display them in the table
                                    foreach ($cases as $index => $case) {
                                        $status = $case['status']; 
                                        $statusClass = ''; 
                                        $statusText = ''; // Default empty
                                        
                                        // Assign a class and text based on the case status
                                        switch ($status) {
                                            case 'Pending':
                                                $statusClass = 'bg-warning';
                                                $statusText = 'Pending';
                                                break;
                                            case 'Assigned':
                                                $statusClass = 'bg-success';
                                                $statusText = 'Assigned';
                                                break;
                                            case 'Declined':
                                                $statusClass = 'bg-danger';
                                                $statusText = 'Declined';
                                                break;
                                            case 'Not Assigned':
                                                $statusClass = 'bg-warning';
                                                $statusText = 'Not Assigned';
                                                break;
                                        }

                                        // Output each case in a table row
                                        echo "<tr>";
                                        echo "<td>" . ($index + 1) . "</td>"; // Display row number (1-based)
                                        echo "<td>" . htmlspecialchars($case['case_id']) . "</td>"; // Case ID
                                        echo "<td>" . htmlspecialchars($case['client_name']) . "</td>"; // Client Name
                                        echo "<td>" . htmlspecialchars($case['status']) . "</td>"; 
                                        echo "<td><a href='#' class='btn btn-info btn-sm'><i class='fa fa-eye'></i> View</a></td>"; // View button
                                        echo "<td>
                                                <form method='POST' action='case_action.php' style='display:inline;'>
                                                    <input type='hidden' name='action' value='approve'>
                                                    <input type='hidden' name='case_id' value='" . $case['case_id'] . "'>
                                                    <button type='submit' class='btn btn-success btn-sm'><i class='fa fa-check'></i> Approve</button>
                                                </form>
                                                <form method='POST' action='case_action.php' style='display:inline;'>
                                                    <input type='hidden' name='action' value='decline'>
                                                    <input type='hidden' name='case_id' value='" . $case['case_id'] . "'>
                                                    <button type='submit' class='btn btn-danger btn-sm'><i class='fa fa-times'></i> Decline</button>
                                                </form>
                                            </td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.btn-success, .btn-danger');

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const caseId = this.closest('tr').querySelector('td:nth-child(2)').textContent.trim();
                    const action = this.classList.contains('btn-success') ? 'approve' : 'decline';

                    if (confirm(`Are you sure you want to ${action} this case?`)) {
                        fetch('case_action.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ action, case_id: caseId })
                        })
                        .then(response => response.json())
                        .then(data => {
                            alert(data.message);
                            if (data.status === 'success') {
                                location.reload();
                            }
                        })
                        .catch(error => {
                            alert('An error occurred: ' + error.message);
                        });
                    }
                });
            });
        });
    </script>

</body>
</html>
