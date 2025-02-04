<?php
require_once '../includes/auth.php';
restrictTo(['clients']);

require_once '../includes/db_connect.php';
$query = "SELECT id, specialization_name FROM specializations";
$result = $conn->query($query);
$specializations = [];
while ($row = $result->fetch_assoc()) {
    $specializations[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit a Case</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/common_dashboard.css">
    <link rel="stylesheet" href="css/case.css">
</head>
<body>
    <!-- Sidebar -->
    <?php include('includes/side-nav.php'); ?>
    <!-- Header -->
    <?php include('includes/header.php'); ?>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin-top: 60px;">Submit a Case</h3>
            <p>Complete the form below to submit your case for review. Ensure all fields are correctly filled for faster processing.</p>

            <!-- Case Submission Form -->
            <div class="form-section">
                <h5>Case Information</h5>
                <form id="caseSubmissionForm" method="POST" action="submit_case_process.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="caseTitle" class="form-label">Case Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="caseTitle" name="caseTitle" placeholder="Enter the case title" required>
                    </div>
                    <div class="mb-3">
                        <label for="caseType" class="form-label">Case Type <span class="text-danger">*</span></label>
                        <select class="form-select" id="caseType" name="caseType" required>
                            <option value="" disabled selected>Select case type</option>
                            <?php foreach ($specializations as $specialization) { ?>
                                <option value="<?= $specialization['id'] ?>"><?= $specialization['specialization_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="caseDetails" class="form-label">Case Details <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="caseDetails" name="caseDetails" rows="5" placeholder="Provide details about your case" required></textarea>
                    </div>

                    <hr>

                    <h5>Supporting Documents</h5>
                    <div id="documentsSection">
                        <div class="document-group mb-3">
                            <div class="row g-2 align-items-center">
                                <div class="col-md-6">
                                    <label for="caseDocument1" class="form-label">Upload Document <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="caseDocument1" name="caseDocuments[]" accept=".pdf,.doc,.docx,.jpg,.png" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="documentDescription1" class="form-label">Document Description <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="documentDescription1" name="documentDescriptions[]" placeholder="Enter document description" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm" id="addDocumentBtn"><i class="fa fa-plus"></i> Add Another Document</button>

                    <hr>

                    <h5>Contact Information</h5>
                    <div class="mb-3">
                        <label for="contactInfo" class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="contactInfo" name="contactInfo" placeholder="Enter your phone or email" required>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit Case</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    <!-- JavaScript to Handle Dynamic Document Upload -->
    <script>
        document.getElementById('addDocumentBtn').addEventListener('click', function () {
            const documentsSection = document.getElementById('documentsSection');
            const newDocumentGroup = document.createElement('div');
            newDocumentGroup.classList.add('document-group', 'mb-3');
            newDocumentGroup.innerHTML = `
                <div class="row g-2 align-items-center">
                    <div class="col-md-6">
                        <label class="form-label">Upload Document</label>
                        <input type="file" class="form-control" name="caseDocuments[]" accept=".pdf,.doc,.docx,.jpg,.png" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Document Description</label>
                        <input type="text" class="form-control" name="documentDescriptions[]" placeholder="Enter document description" required>
                    </div>
                </div>
            `;
            documentsSection.appendChild(newDocumentGroup);
        });
    </script>
</body>
</html>
