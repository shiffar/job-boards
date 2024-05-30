<?php
// Include your database connection code here
include('../connection.php'); // Update the file name to match your connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job_type_id = $_POST['ejob_type_id'];
    $newJobTypeName = $_POST['ejob_type'];

    // Perform the database update operation using plain SQL and MySQLi
    $query = "UPDATE job_type SET job_type = '" . $newJobTypeName . "' WHERE job_type_id = " . $job_type_id;
    
    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'job type updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update job type']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
