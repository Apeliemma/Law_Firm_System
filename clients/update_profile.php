<?php
require_once '../includes/auth.php';
require_once '../includes/db_connect.php';
restrictTo(['clients']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_id = $_SESSION['user_id'];
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    $sql = "UPDATE clients SET full_name = ?, email = ?, phone = ?, updated_at = NOW() WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $full_name, $email, $phone, $client_id);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Profile updated successfully.";
    } else {
        $_SESSION['error_message'] = "Error updating profile: " . $conn->error;
    }

    header('Location: profile.php');
    exit;
}
