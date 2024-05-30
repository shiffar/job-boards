<?php
// Include your database connection code here
include('../connection.php'); // Update the file name to match your connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $skill_id = $_POST['eskill_id'];
    $newSkillName = $_POST['eskill'];

    // Perform the database update operation using plain SQL and MySQLi
    $query = "UPDATE skill SET skill = '" . $newSkillName . "' WHERE skill_id = " . $skill_id;
    
    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'skill updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update skill']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
