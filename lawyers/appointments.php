<?php
include('../includes/db_connect.php');

// Fetch appointments from the database
$sql = "SELECT * FROM appointments_ly ORDER BY appointment_datetime ASC";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments</title>
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
            <h4>Manage Appointments</h4>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <p>View, reschedule, or cancel your appointments.</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAppointmentModal">
                    <i class="fa fa-plus"></i> Add Appointment
                </button>
            </div>

            <!-- Appointment Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Appointment ID</th>
                            <th>Client Name</th>
                            <th>Date & Time</th>
                            <th>Case</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['appointment_id']; ?></td>
                                <td><?php echo $row['client_name']; ?></td>
                                <td><?php echo date('Y-m-d H:i A', strtotime($row['appointment_datetime'])); ?></td>
                                <td><?php echo $row['case_type']; ?></td>
                                <td>
                                    <span class="badge <?php echo ($row['status'] == 'Confirmed') ? 'bg-success' : 'bg-warning'; ?>">
                                        <?php echo $row['status']; ?>
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#rescheduleModal">
                                        <i class="fa fa-calendar-alt"></i> Reschedule
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="cancelAppointment(<?php echo $row['appointment_id']; ?>)">
                                        <i class="fa fa-times"></i> Cancel
                                    </button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <!-- Add Appointment Modal -->
    <div class="modal fade" id="addAppointmentModal" tabindex="-1" aria-labelledby="addAppointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAppointmentModalLabel">Add New Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="POST" action="add-appointment.php">
                    <div class="mb-3">
                        <label for="clientName" class="form-label">Client Name</label>
                        <input type="text" class="form-control" id="clientName" name="client_name" placeholder="Enter client name" required>
                    </div>
                    <div class="mb-3">
                        <label for="caseType" class="form-label">Case</label>
                        <input type="text" class="form-control" id="caseType" name="case_type" placeholder="Enter case details" required>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentDate" class="form-label">Date & Time</label>
                        <input type="datetime-local" class="form-control" id="appointmentDate" name="appointment_datetime" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><i class="fa fa-save"></i> Save Appointment</button>
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
