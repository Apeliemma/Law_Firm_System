<?php
include('../includes/db_connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['assign_case'])) {
    $case_title = $conn->real_escape_string($_POST['case_name']);
    $client_id = (int) $_POST['client_id'];  // Use the correct field name here (client_id)
    $lawyer_id = (int) $_POST['lawyer_id'];

    // Get client ID based on client_id
    $client_query = "SELECT id FROM clients WHERE id=$client_id";  // Use the client_id directly now
    $client_result = $conn->query($client_query);

    if ($client_result && $client_result->num_rows > 0) {
        $client_row = $client_result->fetch_assoc();
        $client_id = $client_row['id'];

        // Insert into cases table
        $case_query = "INSERT INTO cases (case_title, case_details, specialization_id, contact_info, user_id, created_at) 
                       VALUES ('$case_title', '', $lawyer_id, '', $client_id, NOW())";

        if ($conn->query($case_query)) {
            // Get the inserted case ID
            $case_id = $conn->insert_id;

            // Insert into assigned_cases table
            $assigned_query = "INSERT INTO assigned_cases (case_id, client_id, lawyer_id, assigned_at) 
                               VALUES ($case_id, $client_id, $lawyer_id, NOW())";

            if ($conn->query($assigned_query)) {
                echo "<script>alert('Case assigned successfully');</script>";
            } else {
                echo "<script>alert('Error assigning case: " . $conn->error . "');</script>";
            }
        } else {
            echo "<script>alert('Error adding case: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Client not found. Please make sure the client name is correct.');</script>";
    }
}

?>
