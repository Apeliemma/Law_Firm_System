<?php
require_once '../includes/auth.php';
require_once '../includes/db_connect.php';
restrictTo(['clients']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $caseTitle = $_POST['caseTitle'];
    $caseDetails = $_POST['caseDetails'];
    $specializationId = $_POST['caseType'];
    $contactInfo = $_POST['contactInfo'];
    $status = 'Under Review'; 
    
    $userId = $_SESSION['user_id']; 

    // Insert the case information into the `cases` table
    $stmt = $conn->prepare("INSERT INTO cases (case_title, case_details, specialization_id, contact_info, user_id, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssiiis', $caseTitle, $caseDetails, $specializationId, $contactInfo, $userId, $status);
    if ($stmt->execute()) {
        $caseId = $stmt->insert_id;

        // Handle file uploads
        if (isset($_FILES['caseDocuments'])) {
            $documents = $_FILES['caseDocuments'];
            foreach ($documents['name'] as $index => $docName) {
                $fileTmpName = $documents['tmp_name'][$index];
                $fileExtension = pathinfo($docName, PATHINFO_EXTENSION);
                $newDocName = $caseTitle . '_' . basename($docName, '.' . $fileExtension) . '.' . $fileExtension;
                $filePath = 'uploads/' . $newDocName;

                if (move_uploaded_file($fileTmpName, $filePath)) {
                    $docDescription = $_POST['documentDescriptions'][$index];
                    $stmt = $conn->prepare("INSERT INTO case_documents (case_id, document_name, description, user_id) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param('issi', $caseId, $newDocName, $docDescription, $userId);
                    $stmt->execute();
                }
            }
        }
        echo "Case submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
