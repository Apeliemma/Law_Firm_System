<?php
require_once '../includes/auth.php';
require_once '../includes/db_connect.php'; 
restrictTo(['clients']);

// Get the current user (client) ID from session
$user_id = $_SESSION['user_id']; 

// Fetch the lawyers assigned to the client's case
$query = "SELECT l.lawyer_id, CONCAT(l.first_name, ' ', l.last_name) AS lawyer_name 
          FROM lawyers l 
          JOIN cases c ON l.lawyer_id = c.lawyer_id 
          WHERE c.client_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$lawyers = [];
while ($row = mysqli_fetch_assoc($result)) {
    $lawyers[] = $row;
}
mysqli_stmt_close($stmt);

// Process the appointment booking if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lawyer_id = $_POST['lawyer_id'];
    $appointment_date = $_POST['appointment_date'];

    // Validate lawyer selection (ensure the lawyer is assigned to the client's case)
    $validate_query = "SELECT COUNT(*) FROM cases WHERE client_id = ? AND lawyer_id = ?";
    $validate_stmt = mysqli_prepare($conn, $validate_query);
    mysqli_stmt_bind_param($validate_stmt, "ii", $user_id, $lawyer_id);
    mysqli_stmt_execute($validate_stmt);
    mysqli_stmt_bind_result($validate_stmt, $count);
    mysqli_stmt_fetch($validate_stmt);
    mysqli_stmt_close($validate_stmt);

    if ($count == 0) {
        $_SESSION['error'] = "You can only book an appointment with a lawyer assigned to your case.";
        header('Location: appointments.php');
        exit();
    }

    // Save the appointment
    $sql = "INSERT INTO appointments (client_id, lawyer_id, appointment_date) 
            VALUES (?, ?, ?)";
    $insert_stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($insert_stmt, "iis", $user_id, $lawyer_id, $appointment_date);
    mysqli_stmt_execute($insert_stmt);
    mysqli_stmt_close($insert_stmt);

    $_SESSION['success'] = "Appointment booked successfully!";
    header('Location: appointments.php');
    exit();
}
?>
