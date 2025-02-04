<?php
require_once '../includes/auth.php'; 
require_once '../includes/db_connect.php'; 
restrictTo(['clients']);

$user_id = $_SESSION['user_id']; 

// Fetch appointment data for the logged-in client
$query = "SELECT a.appointment_id, a.appointment_date, a.status, l.name as lawyer_name
          FROM appointments a
          JOIN lawyers l ON a.lawyer_id = l.id
          WHERE a.client_id = ? 
          ORDER BY a.appointment_date DESC";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$appointments = [];
while ($row = mysqli_fetch_assoc($result)) {
    $appointments[] = $row;
}

mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointments</title>
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
        <div class="container-fluid mt-4">
            <h4>Book or Manage Appointments</h4>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <p>Book a new appointment with your lawyer or manage existing ones.</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookAppointmentModal">
                    <i class="fa fa-plus"></i> Book Appointment
                </button>
            </div>

            <!-- Appointments Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Appointment ID</th>
                            <th>Lawyer</th>
                            <th>Date & Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($appointments): ?>
                            <?php foreach ($appointments as $appointment): ?>
                                <tr>
                                    <td>AP<?php echo $appointment['id']; ?></td>
                                    <td><?php echo htmlspecialchars($appointment['lawyer_name']); ?></td>
                                    <td><?php echo date('Y-m-d h:i A', strtotime($appointment['appointment_date'])); ?></td>
                                    <td>
                                        <?php
                                            $statusClass = ($appointment['status'] == 'confirmed') ? 'bg-success' : 'bg-warning';
                                            $statusText = ucfirst($appointment['status']);
                                        ?>
                                        <span class="badge <?php echo $statusClass; ?>"><?php echo $statusText; ?></span>
                                    </td>
                                    <td>
                                        <?php if ($appointment['status'] == 'pending'): ?>
                                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#rescheduleModal" data-appointment-id="<?php echo $appointment['id']; ?>">
                                                <i class="fa fa-calendar-alt"></i> Reschedule
                                            </button>
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fa fa-times"></i> Cancel
                                            </button>
                                        <?php else: ?>
                                            <button class="btn btn-sm btn-info" disabled>
                                                <i class="fa fa-calendar-alt"></i> Rescheduled
                                            </button>
                                            <button class="btn btn-sm btn-danger" disabled>
                                                <i class="fa fa-times"></i> Canceled
                                            </button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">No appointments found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Book Appointment Modal -->
    <div class="modal fade" id="bookAppointmentModal" tabindex="-1" aria-labelledby="bookAppointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookAppointmentModalLabel">Book Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="submit_appointment.php" method="POST">
                    <div class="mb-3">
                        <label for="lawyerName" class="form-label">Select Lawyer</label>
                        <select class="form-select" id="lawyerName" name="lawyer_id" required>
                            <option value="" disabled selected>Choose your lawyer</option>
                            <?php foreach ($lawyers as $lawyer): ?>
                                <option value="<?= $lawyer['lawyer_id'] ?>"><?= $lawyer['lawyer_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentDate" class="form-label">Date & Time</label>
                        <input type="datetime-local" class="form-control" id="appointmentDate" name="appointment_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><i class="fa fa-save"></i> Book Appointment</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Reschedule Appointment Modal -->
    <div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rescheduleModalLabel">Reschedule Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="newAppointmentDate" class="form-label">New Date & Time</label>
                            <input type="datetime-local" class="form-control" id="newAppointmentDate" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100"><i class="fa fa-calendar-alt"></i> Reschedule</button>
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
