<div class="header">
    <h5 class="mb-0">Admin Dashboard</h5>
    <div class="d-flex align-items-center">
        <i class="fa fa-bell me-3" style="font-size: 1.2rem; cursor: pointer;"></i>
        <div class="dropdown">
            <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                <i class="fa fa-user-circle me-2"></i>Admin<!--<?php echo $_SESSION['name']; ?>-->
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item text-danger" href="../includes/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</div>