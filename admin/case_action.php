<?php
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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && isset($_POST['case_id'])) {
    $case_id = $_POST['case_id'];
    $action = $_POST['action'];

    // Validate input for action
    if (!in_array($action, ['approve', 'decline'])) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid action.']);
        exit;
    }

    if (!is_numeric($case_id)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid case ID.']);
        exit;
    }


    $status = ($action === 'approve') ? 'Assigned' : 'Declined';

    try {
        // Update the case status in the database
        $query = "UPDATE cases SET status = :status WHERE id = :case_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['status' => $status, 'case_id' => $case_id]);

        // Check if any row was updated
        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 'success', 'message' => 'Case status updated successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Case not found or no changes made.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>
