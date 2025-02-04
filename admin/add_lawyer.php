<?php
include('../includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form inputs and sanitize
    $name = mysqli_real_escape_string($conn, $_POST['lawyerName']);
    $email = mysqli_real_escape_string($conn, $_POST['lawyerEmail']);
    $phone = mysqli_real_escape_string($conn, $_POST['lawyerPhone']);
    $specialization_id = mysqli_real_escape_string($conn, $_POST['lawyerSpecialization']);
    $status = mysqli_real_escape_string($conn, $_POST['lawyerStatus']);
    
    // Get the password inputs and sanitize
    $password = mysqli_real_escape_string($conn, $_POST['lawyerPassword']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['lawyerConfirmPassword']);
    
    // Check if the passwords match
    if ($password !== $confirmPassword) {
        echo "<script>
                alert('Passwords do not match');
                window.location.href = 'manage_lawyers.php';
              </script>";
        exit();
    }
    
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert lawyer data into the database
    $sql = "INSERT INTO lawyers (name, email, phone, specialization_id, status, password) 
            VALUES ('$name', '$email', '$phone', '$specialization_id', '$status', '$hashedPassword')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Lawyer added successfully');
                window.location.href = 'manage_lawyers.php';
              </script>";
    } else {
        echo "<script>
                alert('Failed to add lawyer: " . $conn->error . "');
                window.location.href = 'manage_lawyers.php';
              </script>";
    }
}
?>
