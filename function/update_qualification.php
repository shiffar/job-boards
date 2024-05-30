<?php
// Include your database connection code here
include('../connection.php'); // Update the file name to match your connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $qualification_id = $_POST['equalification_id'];
    $newQualificationName = $_POST['equalification'];

    // Perform the database update operation using plain SQL and MySQLi
    $query = "UPDATE qualification SET qualification = '" . $newQualificationName . "' WHERE qualification_id = " . $qualification_id;
    
    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'qualification updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update qualification']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
