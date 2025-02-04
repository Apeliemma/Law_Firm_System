<?php
include('../includes/db_connect.php'); 

if (isset($_GET['id'])) {
    $client_id = $_GET['id'];

    $sql = "DELETE FROM clients WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $client_id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Client deleted successfully');
                window.location.href = 'manage_clients.php';
              </script>";
    } else {
        echo "<script>
                alert('Failed to delete client: " . $conn->error . "');
                window.location.href = 'manage_clients.php';
              </script>";
    }

    $stmt->close();
}
$conn->close();
?>
