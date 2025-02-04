<?php
include('../includes/db_connect.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Clients</title>
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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>Manage Clients</h3>

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClientModal">
                    <i class="fa fa-plus me-2"></i>Add New Client
                </button>
            </div>
            
            <!-- Table for Client Management -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>ID</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT id, full_name, email, phone, id_number FROM clients ORDER BY id ASC";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>{$row['full_name']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['phone']}</td>
                                        <td>{$row['id_number']}</td>
                                        <td>
                                            <button class='btn btn-sm btn-warning' data-bs-toggle='modal' data-bs-target='#editClientModal' onclick='editClient({$row['id']})'>
                                                <i class='fa fa-edit'></i> Edit
                                            </button>
                                            <button class='btn btn-sm btn-danger' onclick='deleteClient({$row['id']})'>
                                                <i class='fa fa-trash'></i> Delete
                                            </button>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center'>No clients found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding New Client -->
    <div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addClientModalLabel">Add New Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../register.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="clientName" class="form-label">Name</label>
                                <input type="text" id="clientName" name="full_name" class="form-control" placeholder="Enter Client Name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="clientEmail" class="form-label">Email</label>
                                <input type="email" id="clientEmail" name="email" class="form-control" placeholder="Enter Email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="clientPhone" class="form-label">Phone Number</label>
                                <input type="text" id="clientPhone" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="clientID" class="form-label">ID</label>
                                <input type="text" id="clientID" name="id_number" class="form-control" placeholder="Enter ID" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" id="confirmPassword" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Client</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Client -->
    <div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="editClientModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editClientModalLabel">Edit Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="edit_client.php" method="POST">
                        <input type="hidden" id="editClientId" name="id">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="editClientName" class="form-label">Name</label>
                                <input type="text" id="editClientName" name="full_name" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editClientEmail" class="form-label">Email</label>
                                <input type="email" id="editClientEmail" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="editClientPhone" class="form-label">Phone Number</label>
                                <input type="text" id="editClientPhone" name="phone" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editClientID" class="form-label">ID</label>
                                <input type="text" id="editClientID" name="id_number" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JavaScript and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        function deleteClient(clientId) {
            if (confirm('Are you sure you want to delete this client?')) {
                window.location.href = 'delete_client.php?id=' + clientId;
            }
        }

        function editClient(clientId) {
            fetch('get_client.php?id=' + clientId)
                .then(response => response.json())
                .then(data => {
                    // Pre-fill the modal form with the client's details
                    document.getElementById('editClientId').value = data.id;
                    document.getElementById('editClientName').value = data.full_name;
                    document.getElementById('editClientEmail').value = data.email;
                    document.getElementById('editClientPhone').value = data.phone;
                    document.getElementById('editClientID').value = data.id_number;
                });
        }
    </script>

</body>
</html>
