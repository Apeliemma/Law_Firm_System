<?php
include('../includes/db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admins</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/common_dashboard.css">
</head>
<body>
    <!-- Sidebar -->
    <?php include('includes/side-nav.php'); ?>
    <!-- Header -->
    <?php include('includes/header.php'); ?>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <h3>Admin Management</h3>
            
            <!-- Admin Actions -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAdminModal">
                        <i class="fa fa-plus"></i> Add New Admin
                    </button>

                    <!-- Admin Table -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Admin List</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Admin ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM admin_users";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        $count = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $count++ . "</td>";
                                            echo "<td>" . htmlspecialchars($row['admin_id']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                            echo "<td>" . ucfirst($row['role']) . "</td>";
                                            echo "<td><span class='badge " . ($row['status'] === 'active' ? 'bg-success' : 'bg-warning') . "'>" . ucfirst($row['status']) . "</span></td>";
                                            echo "<td>
                                                <button class='btn btn-warning btn-sm edit-btn' 
                                                        data-bs-toggle='modal' 
                                                        data-bs-target='#editAdminModal' 
                                                        data-id='" . $row['id'] . "'
                                                        data-name='" . htmlspecialchars($row['name']) . "'
                                                        data-email='" . htmlspecialchars($row['email']) . "'
                                                        data-role='" . htmlspecialchars($row['role']) . "'
                                                        data-status='" . htmlspecialchars($row['status']) . "'>
                                                        <i class='fa fa-pencil-alt'></i> Edit
                                                </button>
                                                <button class='btn btn-danger btn-sm' onclick='deleteAdmin(" . $row['id'] . ")'><i class='fa fa-trash'></i> Delete</button>
                                            </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7' class='text-center'>No admins found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- Add Admin Modal -->
    <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminModalLabel">Add New Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="add_admin.php" method="POST">
                        <div class="mb-3">
                            <label for="adminName" class="form-label">Admin Name</label>
                            <input type="text" class="form-control" id="adminName" name="adminName" placeholder="Enter name" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="adminEmail" name="adminEmail" placeholder="Enter email" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="adminPassword" name="adminPassword" placeholder="Enter password" required>
                        </div>
                        <div class="mb-3">
                            <label for="adminRole" class="form-label">Role</label>
                            <select class="form-select" id="adminRole" name="adminRole" required>
                                <option value="" selected disabled>Select Role</option>
                                <option value="superAdmin">Super Admin</option>
                                <option value="moderator">Moderator</option>
                                <option value="editor">Editor</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="adminStatus" class="form-label">Status</label>
                            <select class="form-select" id="adminStatus" name="adminStatus" required>
                                <option value="" selected disabled>Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Admin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Admin Modal -->
    <div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="editAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAdminModalLabel">Edit Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="edit_admin.php" method="POST">
                        <input type="hidden" id="editAdminId" name="adminId">
                        <div class="mb-3">
                            <label for="editAdminName" class="form-label">Admin Name</label>
                            <input type="text" class="form-control" id="editAdminName" name="adminName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAdminEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="editAdminEmail" name="adminEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAdminRole" class="form-label">Role</label>
                            <select class="form-select" id="editAdminRole" name="adminRole" required>
                                <option value="" selected disabled>Select Role</option>
                                <option value="superAdmin">Super Admin</option>
                                <option value="moderator">Moderator</option>
                                <option value="editor">Editor</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editAdminStatus" class="form-label">Status</label>
                            <select class="form-select" id="editAdminStatus" name="adminStatus" required>
                                <option value="" selected disabled>Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Admin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Pre-fill edit modal with data
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('editAdminId').value = button.dataset.id;
                document.getElementById('editAdminName').value = button.dataset.name;
                document.getElementById('editAdminEmail').value = button.dataset.email;
                document.getElementById('editAdminRole').value = button.dataset.role;
                document.getElementById('editAdminStatus').value = button.dataset.status;
            });
        });

        function deleteAdmin(id) {
            if (confirm('Are you sure you want to delete this admin?')) {
                window.location.href = `delete_admin.php?id=${id}`;
            }
        }
    </script>

    <!-- Bootstrap JavaScript and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
