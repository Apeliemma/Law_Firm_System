<?php
include('../includes/db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Areas of Specialization</title>
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
                <h3>Manage Areas of Specialization</h3>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSpecializationModal">
                    <i class="fa fa-plus me-2"></i>Add New Specialization
                </button>
            </div>

            <!-- Table for Areas of Specialization -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Specialization Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM specializations";
                            $result = $conn->query($sql);
                            $counter = 1;

                            if ($result->num_rows > 0) {
                                // Output each specialization
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $counter++ . "</td>";
                                    echo "<td>" . $row['specialization_name'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td>
                                        <button class='btn btn-sm btn-warning' data-bs-toggle='modal' data-bs-target='#editSpecializationModal' data-id='" . $row['id'] . "' data-name='" . $row['specialization_name'] . "' data-description='" . $row['description'] . "'>
                                            <i class='fa fa-edit'></i> Edit
                                        </button>
                                        <button class='btn btn-sm btn-danger delete-btn' data-id='" . $row['id'] . "'>
                                            <i class='fa fa-trash'></i> Delete
                                        </button>
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No specializations found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding New Specialization -->
    <div class="modal fade" id="addSpecializationModal" tabindex="-1" aria-labelledby="addSpecializationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSpecializationModalLabel">Add New Specialization</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="add_specialization.php" method="POST">
                        <div class="mb-3">
                            <label for="specializationName" class="form-label">Specialization Name</label>
                            <input type="text" id="specializationName" name="specialization_name" class="form-control" placeholder="Enter Specialization Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="specializationDescription" class="form-label">Description</label>
                            <textarea id="specializationDescription" name="description" class="form-control" rows="4" placeholder="Enter Specialization Description" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Specialization</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Specialization -->
    <div class="modal fade" id="editSpecializationModal" tabindex="-1" aria-labelledby="editSpecializationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSpecializationModalLabel">Edit Specialization</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="edit_specialization.php" method="POST">
                        <input type="hidden" id="editId" name="id">
                        <div class="mb-3">
                            <label for="editSpecializationName" class="form-label">Specialization Name</label>
                            <input type="text" id="editSpecializationName" name="specialization_name" class="form-control" placeholder="Enter Specialization Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editSpecializationDescription" class="form-label">Description</label>
                            <textarea id="editSpecializationDescription" name="description" class="form-control" rows="4" placeholder="Enter Specialization Description" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Specialization</button>
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
        // Fill the edit modal with existing data
        const editModal = document.getElementById('editSpecializationModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const description = button.getAttribute('data-description');
            
            const modalId = editModal.querySelector('#editId');
            const modalName = editModal.querySelector('#editSpecializationName');
            const modalDescription = editModal.querySelector('#editSpecializationDescription');
            
            modalId.value = id;
            modalName.value = name;
            modalDescription.value = description;
        });

        // Delete specialization
        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id = button.getAttribute('data-id');
                if (confirm("Are you sure you want to delete this specialization?")) {
                    window.location.href = "delete_specialization.php?id=" + id;
                }
            });
        });
    </script>
</body>
</html>
