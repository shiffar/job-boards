<?php
// Include your database connection code here
include('../connection.php'); // Update the file name to match your connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $experience_id = $_POST['eexperience_id'];
    $newExperienceName = $_POST['eexperience'];

    // Perform the database update operation using plain SQL and MySQLi
    $query = "UPDATE experience SET experience = '" . $newExperienceName . "' WHERE experience_id = " . $experience_id;
    
    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'experience updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update experience']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
