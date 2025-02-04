<?php
session_start();
require_once 'includes/db_connect.php'; 

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate against all user tables
    $queries = [
        'admin_users' => "SELECT * FROM admin_users WHERE email = ? AND status = 'active'",
        'lawyers' => "SELECT * FROM lawyers WHERE email = ? AND status = 'active'",
        'clients' => "SELECT * FROM clients WHERE email = ?",
    ];

    foreach ($queries as $table => $query) {
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $email); 
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Debugging - Check if user is found
        if ($user) {
            var_dump($user);  // Check the user data
        }

        if ($user && password_verify($password, $user['password'])) {
            // Set session variables based on user type
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $table; 
            $_SESSION['user_name'] = $user['full_name'];

            // Debugging - Check session data
            var_dump($_SESSION);

            // Redirect based on role
            if ($table == 'admin_users') {
                $_SESSION['role'] = $user['role']; // Specific role for admins
                header('Location: admin/admins.php');
                exit;
            } elseif ($table == 'lawyers') {
                header('Location: lawyers/lawyers_dshbrd.php');
                exit;
            } else {
                header('Location: clients/client_dshbrd.php');
                exit;
            }
        }
    }

    // If no match found
    $_SESSION['error'] = 'Invalid email or password';
    header('Location: index.php');
    exit;
}
?>
