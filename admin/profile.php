<?php
require_once '../includes/auth.php';
require_once '../includes/db_connect.php'; 
restrictTo(['admin']);

// Fetch logged-in client details
$admin_id = $_SESSION['user_id']; 
$sql = "SELECT name, email, role, created_at FROM admin_users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $admin_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc();
} else {
    die("admin not found."); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
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
            <h3>My Profile</h3>
            <div class="row mt-4">
                <div class="col-md-4">
                    <!-- Profile Card -->
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="https://www.officelovin.com/wp-content/uploads/2020/05/private-law-office-austin-8.jpg" alt="Profile Picture" class="rounded-circle mb-3" width="150">
                            <h5 class="card-title"><?= htmlspecialchars($admin['name']); ?></h5>
                            <p class="card-text text-muted"><?= htmlspecialchars($admin['role']); ?></p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateProfileModal">
                                <i class="fa fa-edit"></i> Edit Profile
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <!-- Profile Details -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Profile Details</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($admin['email']); ?></li>
                                <li class="list-group-item"><strong>Joined:</strong> <?= htmlspecialchars($admin['created_at']); ?></li>
                                <li class="list-group-item"><strong>Status:</strong> Active</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Updating Profile -->
    <div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="update_profile.php">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="full_name" value="<?= htmlspecialchars($admin['full_name']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($admin['email']); ?>" required>
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
</body>
</html>
