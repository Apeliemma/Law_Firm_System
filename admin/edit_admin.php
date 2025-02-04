<?php
include('../includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['adminId']);
    $name = mysqli_real_escape_string($conn, $_POST['adminName']);
    $email = mysqli_real_escape_string($conn, $_POST['adminEmail']);
    $role = mysqli_real_escape_string($conn, $_POST['adminRole']);
    $status = mysqli_real_escape_string($conn, $_POST['adminStatus']);

    $sql = "UPDATE admin_users 
            SET name='$name', email='$email', role='$role', status='$status' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Admin updated successfully');
                window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
              </script>";
    } else {
        echo "<script>
                alert('Failed to update admin: " . $conn->error . "');
                window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
              </script>";
    }
}
?>
