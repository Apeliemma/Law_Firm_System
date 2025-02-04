<?php
include('../includes/db_connect.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client_id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $id_number = $_POST['id_number'];

    // Update query
    $sql = "UPDATE clients SET full_name = ?, email = ?, phone = ?, id_number = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $full_name, $email, $phone, $id_number, $client_id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Client information updated successfully');
                window.location.href = 'manage_clients.php';
              </script>";
    } else {
        echo "<script>
                alert('Failed to update client: " . $conn->error . "');
                window.location.href = 'manage_clients.php';
              </script>";
    }

    $stmt->close();
}
$conn->close();
?>
