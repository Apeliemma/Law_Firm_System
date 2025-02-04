<?php
require_once '../includes/auth.php';
require_once '../includes/db_connect.php'; 
restrictTo(['clients']);

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $case_id = $_POST['case_id'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];
    
    // Validate the data (simple validation)
    if (empty($case_id) || empty($amount) || empty($payment_method)) {
        $_SESSION['error'] = "All fields are required!";
        header('Location: payments.php'); 
        exit();
    }

    $payment_status = 'Completed'; 
    
    // Save transaction details to the database using mysqli
    $sql = "INSERT INTO payments (user_id, case_id, amount, payment_method, payment_status, payment_date)
            VALUES (?, ?, ?, ?, ?, NOW())";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters
        $stmt->bind_param("iisds", $_SESSION['user_id'], $case_id, $amount, $payment_method, $payment_status);

        // Execute the statement
        if ($stmt->execute()) {
            $_SESSION['success'] = "Payment successful!";
        } else {
            $_SESSION['error'] = "An error occurred while processing your payment.";
        }

        // Close the statement
        $stmt->close();
    } else {
        $_SESSION['error'] = "Error preparing the query.";
    }

    // Redirect back to the payment page
    header('Location: payments.php');
    exit();
}
?>
