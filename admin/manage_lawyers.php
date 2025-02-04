<?php
include('../includes/db_connect.php'); 

$specQuery = "SELECT * FROM specializations";
$specResult = mysqli_query($conn, $specQuery);

$sql = "SELECT lawyers.*, specializations.specialization_name 
        FROM lawyers
        JOIN specializations ON lawyers.specialization_id = specializations.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Manage Lawyers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/common_dashboard.css">
    <style>
        .action-buttons button {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <?php include('includes/side-nav.php'); ?>

    <!-- Header -->
    <?php include('includes/header.php'); ?>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <h3>Manage Lawyers</h3>
            <p>View and manage the list of registered lawyers below.</p>

            <!-- Add Lawyer Button -->
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addLawyerModal">
                <i class="fa fa-plus"></i> Add Lawyer
            </button>

            <!-- Lawyers Table -->
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Lawyers Overview</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Specialization</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Check if any lawyers were found
                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['name'] . "</td>"; 
                                        echo "<td>" . $row['specialization_name'] . "</td>"; 
                                        echo "<td>" . $row['email'] . "</td>"; 
                                        echo "<td>" . $row['phone'] . "</td>"; 
                                        echo "<td><span class='badge bg-" . ($row['status'] == 'active' ? 'success' : 'danger') . "'>" . ucfirst($row['status']) . "</span></td>"; // Display status with badge
                                        echo "<td class='action-buttons'>
                                                <button class='btn btn-sm btn-primary'><i class='fa fa-eye'></i> View</button>
                                                <button class='btn btn-sm btn-warning'><i class='fa fa-pen'></i> Edit</button>
                                                <button class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Remove</button>
                                            </td>"; 
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>No lawyers found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Add Lawyer Modal -->
            <div class="modal fade" id="addLawyerModal" tabindex="-1" aria-labelledby="addLawyerModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="addLawyerModalLabel">Add Lawyer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="add_lawyer.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="lawyerName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="lawyerName" name="lawyerName" placeholder="Enter Lawyer's Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lawyerSpecialization" class="form-label">Specialization</label>
                                        <select id="lawyerSpecialization" name="lawyerSpecialization" class="form-select" required>
                                            <option value="" selected disabled>Select Specialization</option>
                                            <?php while ($specRow = mysqli_fetch_assoc($specResult)): ?>
                                                <option value="<?= $specRow['id']; ?>"><?= $specRow['specialization_name']; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="lawyerEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="lawyerEmail" name="lawyerEmail" placeholder="Enter Email" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lawyerPhone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="lawyerPhone" name="lawyerPhone" placeholder="Enter Phone Number" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="lawyerPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="lawyerPassword" name="lawyerPassword" placeholder="Enter Password" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lawyerConfirmPassword" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="lawyerConfirmPassword" name="lawyerConfirmPassword" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="lawyerStatus" class="form-label">Status</label>
                                    <select id="lawyerStatus" name="lawyerStatus" class="form-select" required>
                                        <option value="" selected>Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="pending">Pending</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Lawyer</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JavaScript and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
