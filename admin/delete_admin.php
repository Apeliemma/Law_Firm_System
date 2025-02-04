<?php
include('../includes/db_connect.php'); 

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM admin_users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Admin deleted successfully');
                window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
              </script>";
    } else {
        echo "<script>
                alert('Failed to delete admin: " . $conn->error . "');
                window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
              </script>";
    }
}
?>
