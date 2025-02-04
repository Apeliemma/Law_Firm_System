<?php
include '../includes/db_connect.php';

$cases_query = "SELECT cases.id, cases.case_title, clients.full_name AS client_name, lawyers.name AS lawyer_name, 
                       cases.created_at AS timeline, cases.status 
                FROM cases 
                JOIN clients ON cases.user_id = clients.id
                JOIN lawyers ON cases.specialization_id = lawyers.id";

$result = $conn->query($cases_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Cases</title>
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
                <h3>Assign Cases</h3>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignCaseModal">
                    <i class="fa fa-plus me-2"></i>Assign New Case
                </button>
            </div>
            <!-- Table for Case Assignments -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Case Name</th>
                                <th>Client</th>
                                <th>Assigned Lawyer</th>
                                <th>Timeline</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['case_title']}</td>
                                        <td>{$row['client_name']}</td>
                                        <td>{$row['lawyer_name']}</td>
                                        <td>{$row['timeline']}</td>
                                        <td>
                                            <button class='btn btn-sm btn-warning'><i class='fa fa-edit'></i> Edit</button>
                                            <button class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Delete</button>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No cases found</td></tr>";
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Assigning a New Case -->
    <div class="modal fade" id="assignCaseModal" tabindex="-1" aria-labelledby="assignCaseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignCaseModalLabel">Assign New Case</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="POST" action="assign-case.php">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="caseName" class="form-label">Case Name</label>
                                <input type="text" id="caseName" name="case_name" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="clientName" class="form-label">Client</label>
                                <select id="clientName" name="client_id" class="form-select" required>
                                    <option value="" selected disabled>Select Client</option>
                                    <?php
                                        // Fetch clients from the database
                                        $clients_query = "SELECT id, full_name FROM clients";
                                        $clients_result = $conn->query($clients_query);
                                        while ($client = $clients_result->fetch_assoc()) {
                                            echo "<option value='{$client['id']}'>{$client['full_name']}</option>";
                                        }
                                    ?>
                                </select>
                            </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="lawyerSelect" class="form-label">Assign Lawyer</label>
                                <select id="lawyerSelect" name="lawyer_id" class="form-select" required>
                                    <option value="" selected disabled>Select Lawyer</option>
                                    <?php
                                        $lawyers_query = "SELECT id, name FROM lawyers WHERE status='active'";
                                        $lawyers_result = $conn->query($lawyers_query);
                                        while ($lawyer = $lawyers_result->fetch_assoc()) {
                                            echo "<option value='{$lawyer['id']}'>{$lawyer['name']}</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="caseTimeline" class="form-label">Timeline</label>
                                <input type="datetime-local" id="caseTimeline" name="timeline" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="assign_case" class="btn btn-primary">Assign Case</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
