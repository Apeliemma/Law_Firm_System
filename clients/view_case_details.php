<?php
require_once '../includes/auth.php';
require_once '../includes/db_connect.php';

// Restrict access to clients
restrictTo(['clients']);

// Assuming the case ID is passed via GET request
$caseId = $_GET['case_id'] ?? null;

if ($caseId) {
    // Fetch case details from the database
    $stmt = $conn->prepare("SELECT c.case_title, c.case_details, c.created_at, c.status, s.specialization_name 
                            FROM cases c 
                            JOIN specializations s ON c.specialization_id = s.id 
                            WHERE c.id = ?");
    $stmt->bind_param('i', $caseId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $case = $result->fetch_assoc();
    } else {
        echo "Case not found!";
        exit;
    }

    // Fetch document details from the case_documents table
    $docStmt = $conn->prepare("SELECT d.document_name, d.description, d.created_at, d.document_path 
                               FROM case_documents d 
                               WHERE d.case_id = ?");
    $docStmt->bind_param('i', $caseId);
    $docStmt->execute();
    $docResult = $docStmt->get_result();
    $documents = [];
    while ($doc = $docResult->fetch_assoc()) {
        $documents[] = $doc;
    }
} else {
    echo "Invalid case ID!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Details</title>
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
            <h3>Case Details</h3>
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Case Title: <?php echo htmlspecialchars($case['case_title']); ?></h5>
                    <p><strong>Case Type:</strong> <?php echo htmlspecialchars($case['specialization_name']); ?></p>
                    <p><strong>Submission Date:</strong> <?php echo date('Y-m-d', strtotime($case['created_at'])); ?></p>
                    <p>
                        <strong>Status:</strong> 
                        <?php
                        // Display the status with different badge colors
                        $statusClass = '';
                        switch ($case['status']) {
                            case 'Under Review':
                                $statusClass = 'bg-warning text-dark';
                                break;
                            case 'Approved':
                                $statusClass = 'bg-success';
                                break;
                            case 'Declined':
                                $statusClass = 'bg-danger';
                                break;
                        }
                        ?>
                        <span class="badge <?php echo $statusClass; ?>"><?php echo htmlspecialchars($case['status']); ?></span>
                    </p>
                    <hr>
                    <h6>Case Description:</h6>
                    <p>
                        <?php echo nl2br(htmlspecialchars($case['case_details'])); ?>
                    </p>
                    <hr>
                    <h6>Case Documents:</h6>
                    <?php if (count($documents) > 0): ?>
                        <ul class="list-group">
                            <?php foreach ($documents as $document): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong><?php echo htmlspecialchars($document['document_name']); ?></strong>
                                    <small><em>Uploaded on: <?php echo date('Y-m-d', strtotime($document['created_at'])); ?></em></small>
                                    <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($document['description'])); ?></p>
                                    <a href="<?php echo htmlspecialchars($document['document_path']); ?>" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="fa fa-download"></i> View Document
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>No documents available for this case.</p>
                    <?php endif; ?>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit Case</button>
                        <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete Case</button>
                        <a href="cases_history.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back to My Cases</a>
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
