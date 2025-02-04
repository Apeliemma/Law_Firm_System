<?php
include('../includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $specialization_name = $_POST['specialization_name'];
    $description = $_POST['description'];

    $sql = "UPDATE specializations SET specialization_name='$specialization_name', description='$description' WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Specialization updated successfully!'); window.location.href='specializations.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
