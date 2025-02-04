<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Client</title>
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
            <h3>Message Client</h3>
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Case #12345: Messaging</h5>
                </div>
                <div class="card-body">
                    <!-- Chat Area -->
                    <div id="chatArea" class="mb-4" style="height: 300px; overflow-y: scroll; background: #f8f9fa; padding: 15px; border: 1px solid #ddd;">
                        <div class="d-flex mb-3">
                            <div class="bg-primary text-white p-3 rounded me-auto">
                                <strong>Lawyer:</strong> Please provide additional documentation.
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="bg-secondary text-white p-3 rounded ms-auto">
                                <strong>Client:</strong> I have sent the documents via email.
                            </div>
                        </div>
                    </div>

                    <!-- Message Input -->
                    <form id="messageForm">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Type your message..." required>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> Send</button>
                        </div>
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
