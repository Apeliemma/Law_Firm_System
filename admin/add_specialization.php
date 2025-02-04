<?php
include('../includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $specialization_name = $_POST['specialization_name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO specializations (specialization_name, description) VALUES ('$specialization_name', '$description')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New specialization added successfully!'); window.location.href='specializations.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
