<?php
include'../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $skill_id = $_POST['eskill_id'];

    // Perform the database delete operation
    $query = "DELETE FROM skill WHERE skill_id = $skill_id";

    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'skill deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete skill']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
