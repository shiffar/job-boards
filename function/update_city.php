<?php
// Include your database connection code here
include('../connection.php'); // Update the file name to match your connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cities_id = $_POST['ecities_id'];
    $newCityName = $_POST['ecities'];

    // Perform the database update operation using plain SQL and MySQLi
    $query = "UPDATE cities SET cities = '" . $newCityName . "' WHERE cities_id = " . $cities_id;
    
    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'city updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update city']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
