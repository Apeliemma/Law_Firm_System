<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Details</title>
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
            <h3>Case Details</h3>
            
            <!-- Case Information Card -->
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Case #12345</h5>
                    <p><strong>Case Type:</strong> Family</p>
                    <p><strong>Client Name:</strong> John Doe</p>
                    <p><strong>Status:</strong> <span class="badge bg-warning">In Progress</span></p>
                    <p><strong>Assigned Date:</strong> 2024-12-01</p>
                    <p><strong>Description:</strong> This case involves a family custody dispute with legal and financial implications.</p>
                    <a href="message_client.php" class="btn btn-primary mt-3"><i class="fa fa-comments"></i> Message Client</a>
                </div>
            </div>

            <!-- Case Files Section -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Case Files</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>File Name</th>
                                <th>Uploaded By</th>
                                <th>Date Uploaded</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Data -->
                            <tr>
                                <td>Document_1.pdf</td>
                                <td>Client</td>
                                <td>2024-12-10</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Download</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Evidence_Photos.zip</td>
                                <td>Lawyer</td>
                                <td>2024-12-12</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Download</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Upload New Files -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Upload New File</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="fileUpload" class="form-label">Select File</label>
                            <input type="file" class="form-control" id="fileUpload" required>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
