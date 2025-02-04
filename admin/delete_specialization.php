<?php
include('../includes/db_connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM specializations WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Specialization deleted successfully!'); window.location.href='specializations.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
