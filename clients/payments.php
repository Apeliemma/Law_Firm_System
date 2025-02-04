<?php
require_once '../includes/auth.php';
require_once '../includes/db_connect.php';

// Restrict access to clients
restrictTo(['clients']);

// Fetch available cases for payment
$client_id = $_SESSION['user_id'];
$query_cases = "SELECT * FROM cases WHERE user_id = '$client_id' AND status = 'approved'";
$result_cases = $conn->query($query_cases);

if ($result_cases === false) {
    die("Error fetching cases: " . $conn->error);
}

$cases = [];
while ($row = $result_cases->fetch_assoc()) {
    $cases[] = $row;
}

// Fetch payment history
$query_history = "SELECT p.id, p.case_id, p.amount, p.payment_method, p.payment_status, p.payment_date, p.transaction_reference, c.case_title AS case_name
                  FROM payments p
                  JOIN cases c ON p.case_id = c.id
                  WHERE p.user_id = '$client_id'
                  ORDER BY p.payment_date DESC";

$result_history = $conn->query($query_history);

if ($result_history === false) {
    die("Error fetching payment history: " . $conn->error);
}

$payments = [];
while ($row = $result_history->fetch_assoc()) {
    $payments[] = $row;
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay for Case</title>
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
            <h3>Pay for Your Case</h3>
            <p>Select an active case below to proceed with payment.</p>

            <!-- Button to Trigger Modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">
                <i class="fa fa-credit-card"></i> Pay for Case
            </button>

            <!-- Modal for Payment -->
            <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="paymentModalLabel">Pay for Your Case</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="process_payment.php" method="POST" id="paymentForm">
                                <div class="mb-3">
                                    <label for="caseSelect" class="form-label">Choose Case</label>
                                    <select class="form-select" id="caseSelect" name="case_id" required>
                                        <option value="" disabled selected>Select case</option>
                                        <?php foreach ($cases as $case): ?>
                                            <option value="<?= $case['id']; ?>"><?= $case['case_title']; ?> - <?= $case['status']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount to Pay</label>
                                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter payment amount" required>
                                </div>

                                <div class="mb-3">
                                    <label for="paymentMethod" class="form-label">Select Payment Method</label>
                                    <select class="form-select" id="paymentMethod" name="payment_method" required>
                                        <option value="" disabled selected>Select payment method</option>
                                        <option value="mpesa">M-Pesa</option>
                                        <option value="bank">Bank Transfer</option>
                                        <option value="airtel">Airtel Money</option>
                                    </select>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fa fa-credit-card"></i> Proceed to Payment
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment History Section -->
            <div class="mt-5">
                <h4>Payment History</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Case</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($payments as $payment): ?>
                            <tr>
                                <td><?= $payment['payment_date']; ?></td>
                                <td><?= $payment['case_name']; ?></td>
                                <td><?= $payment['amount']; ?></td>
                                <!--<td><?= $payment['payment_method']; ?></td>-->
                                <td><?= $payment['payment_status']; ?>
                            </tr>
                        <?php endforeach; ?>
                        <!-- More payments can be added here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
