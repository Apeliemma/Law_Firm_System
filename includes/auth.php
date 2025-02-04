<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    $_SESSION['error'] = 'You must log in to access this page';
    header('Location: ../index.php');
    exit;
}

// Ensure the username and user_id are passed if needed
if (!isset($_SESSION['user_name']) || !isset($_SESSION['user_id'])) {
    $_SESSION['error'] = 'Session error: Username or User ID is missing';
    header('Location: ../index.php');
    exit;
}

// Role-specific restrictions
function restrictTo($roles = []) {
    if (!isset($_SESSION['user_role']) || !in_array($_SESSION['user_role'], $roles)) {
        $_SESSION['error'] = 'You do not have permission to access this page';
        header('Location: ../index.php');
        exit;
    }
}
?>
