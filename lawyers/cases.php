<?php
session_start();
$lawyer_id = $_SESSION['user_id']; 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "muthomi-firm"; 

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT c.id AS case_id, c.case_title, cl.full_name AS client_name, c.status, c.created_at 
              FROM cases c
              LEFT JOIN clients cl ON c.user_id = cl.id
              WHERE c.user_id = :lawyer_id";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':lawyer_id', $lawyer_id, PDO::PARAM_INT);
    $stmt->execute();
    
    // Fetch all the results
    $cases = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Assigned Cases</title>
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
            <h3>Manage Assigned Cases</h3>
            <p>Below are the cases assigned to you. Click on actions to view more details or update the case.</p>

            <!-- Cases Table -->
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Case ID</th>
                            <th scope="col">Case Type</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Assigned Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($cases): ?>
                            <?php foreach ($cases as $case): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($case['case_id']); ?></td>
                                    <td><?php echo htmlspecialchars($case['case_title']); ?></td>
                                    <td><?php echo htmlspecialchars($case['client_name']); ?></td>
                                    <td>
                                        <span class="badge <?php echo $case['status'] == 'Completed' ? 'bg-success' : 'bg-warning'; ?>">
                                            <?php echo htmlspecialchars($case['status']); ?>
                                        </span>
                                    </td>
                                    <td><?php echo htmlspecialchars($case['created_at']); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="view_case.php?id=<?php echo $case['case_id']; ?>" class="btn btn-sm btn-primary">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                            <a href="update_case.php?id=<?php echo $case['case_id']; ?>" class="btn btn-sm btn-success">
                                                <i class="fa fa-pen"></i> Update
                                            </a>
                                            <a href="message_client.php?id=<?php echo $case['case_id']; ?>" class="btn btn-sm btn-info">
                                                <i class="fa fa-envelope"></i> Message
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No cases assigned to you yet.</td>
                            </tr>
                        <?php endif; ?>
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
