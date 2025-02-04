<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audit Logs</title>
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
                <h3>Audit Logs</h3>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filterLogsModal">
                    <i class="fa fa-filter me-2"></i>Filter Logs
                </button>
            </div>

            <!-- Table for Audit Logs -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Action</th>
                                <th>Date & Time</th>
                                <th>IP Address</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Placeholder Data -->
                            <tr>
                                <td>1</td>
                                <td>Admin</td>
                                <td>Login</td>
                                <td>2024-12-15 10:23 AM</td>
                                <td>192.168.1.1</td>
                                <td>
                                    <button class="btn btn-sm btn-info">
                                        <i class="fa fa-eye"></i> View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>John Doe</td>
                                <td>Updated Profile</td>
                                <td>2024-12-14 03:45 PM</td>
                                <td>192.168.1.25</td>
                                <td>
                                    <button class="btn btn-sm btn-info">
                                        <i class="fa fa-eye"></i> View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Jane Smith</td>
                                <td>Deleted Record</td>
                                <td>2024-12-13 08:12 AM</td>
                                <td>192.168.1.50</td>
                                <td>
                                    <button class="btn btn-sm btn-info">
                                        <i class="fa fa-eye"></i> View
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Filtering Logs -->
    <div class="modal fade" id="filterLogsModal" tabindex="-1" aria-labelledby="filterLogsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterLogsModalLabel">Filter Logs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="filterUser" class="form-label">User</label>
                            <input type="text" id="filterUser" class="form-control" placeholder="Enter username">
                        </div>
                        <div class="mb-3">
                            <label for="filterDate" class="form-label">Date</label>
                            <input type="date" id="filterDate" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="filterAction" class="form-label">Action Type</label>
                            <select id="filterAction" class="form-select">
                                <option value="">All Actions</option>
                                <option value="login">Login</option>
                                <option value="update">Update</option>
                                <option value="delete">Delete</option>
                                <option value="add">Add</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Apply Filters</button>
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
