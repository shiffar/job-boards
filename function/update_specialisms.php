<?php
// Include your database connection code here
include('../connection.php'); // Update the file name to match your connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $specialisms_id = $_POST['especialisms_id'];
    $newSpecialismsName = $_POST['especialisms'];

    // Perform the database update operation using plain SQL and MySQLi
    $query = "UPDATE specialisms SET specialisms = '" . $newSpecialismsName . "' WHERE specialisms_id = " . $specialisms_id;
    
    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'specialisms updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update specialisms']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
