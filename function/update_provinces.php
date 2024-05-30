<?php
// Include your database connection code here
include('../connection.php'); // Update the file name to match your connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $provinces_id = $_POST['eprovinces_id'];
    $newProvincesName = $_POST['eprovinces'];

    // Perform the database update operation using plain SQL and MySQLi
    $query = "UPDATE provinces SET provinces = '" . $newProvincesName . "' WHERE provinces_id = " . $provinces_id;
    
    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'provinces updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update provinces']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
