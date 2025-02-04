<?php
include('../includes/db_connect.php');

// Fetch cases from the database
$sql = "SELECT * FROM cases";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output each row as an associative array
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['case_title'] . "</td>";
        echo "<td>" . $row['case_details'] . "</td>";
        echo "<td>" . $row['contact_info'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>
                <a href='update_case.php?action=approve&id=" . $row['id'] . "' class='btn btn-success btn-sm'>Approve</a>
                <a href='update_case.php?action=decline&id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Decline</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No cases found</td></tr>";
}

$conn->close();
?>
