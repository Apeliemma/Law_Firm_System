<?php
include('../includes/db_connect.php');

// Get the action and case ID from the URL
$action = $_GET['action'];
$case_id = $_GET['id'];

// Validate action
if ($action === 'approve' || $action === 'decline') {
    // Update the case status based on the action
    $status = ($action === 'approve') ? 'Approved' : 'Declined';
    
    // Update the case in the database
    $sql = "UPDATE cases SET status = '$status' WHERE id = $case_id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Case updated successfully!";
    } else {
        echo "Error updating case: " . $conn->error;
    }
} else {
    echo "Invalid action!";
}

$conn->close();

// Redirect to the cases page
header("Location: manage_cases.php");
exit();
?>
