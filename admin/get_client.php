<?php
include('../includes/db_connect.php'); 

if (isset($_GET['id'])) {
    $client_id = $_GET['id'];

    // Select client details
    $sql = "SELECT id, full_name, email, phone, id_number FROM clients WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $client = $result->fetch_assoc();
        echo json_encode($client); 
    }

    $stmt->close();
}
$conn->close();
?>
