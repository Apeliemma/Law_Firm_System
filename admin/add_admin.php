<?php
include('../includes/db_connect.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $name = mysqli_real_escape_string($conn, $_POST['adminName']);
    $email = mysqli_real_escape_string($conn, $_POST['adminEmail']);
    $password = mysqli_real_escape_string($conn, $_POST['adminPassword']);
    $role = mysqli_real_escape_string($conn, $_POST['adminRole']);
    $status = mysqli_real_escape_string($conn, $_POST['adminStatus']);
    
    // Generate a unique admin ID
    $admin_id = uniqid('admin_');
    
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new admin into the database
    $sql = "INSERT INTO admin_users (admin_id, name, email, password, role, status) 
            VALUES ('$admin_id', '$name', '$email', '$hashed_password', '$role', '$status')";

    if ($conn->query($sql) === TRUE) {
        header("Location: admins.php?message=Admin added successfully");
    } else {
        header("Location: admins.php?error=Failed to add admin: " . $conn->error);
    }
}
?>
