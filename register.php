<?php
include('includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user inputs
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $id_number = mysqli_real_escape_string($conn, $_POST['id_number']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Validation
    if ($password !== $confirm_password) {
        echo "<script>
                alert('Passwords do not match');
                window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
              </script>";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $sql = "INSERT INTO clients (full_name, email, phone, id_number, password) 
            VALUES ('$full_name', '$email', '$phone', '$id_number', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Registration successful');
                window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
              </script>";
    } else {
        echo "<script>
                alert('Failed to register: " . $conn->error . "');
                window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
              </script>";
    }
}
?>
