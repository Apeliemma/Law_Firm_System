<?php
include('../includes/db_connect.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_name = $_POST['client_name'];
    $case_type = $_POST['case_type'];
    $appointment_datetime = $_POST['appointment_datetime'];

    $sql = "INSERT INTO appointments_ly (client_name, case_type, appointment_datetime) 
            VALUES ('$client_name', '$case_type', '$appointment_datetime')";

    if ($conn->query($sql) === TRUE) {
        echo "New appointment added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
