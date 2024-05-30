<?php
// Include your database connection code here
include('../connection.php'); // Update the file name to match your connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $industry_id = $_POST['eindustry_id'];
    $newIndustryName = $_POST['eindustry'];

    // Perform the database update operation using plain SQL and MySQLi
    $query = "UPDATE industry SET industry = '" . $newIndustryName . "' WHERE industry_id = " . $industry_id;
    
    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'industry updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update industry']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
