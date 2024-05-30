<?php
include'../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $experience_id = $_POST['eexperience_id'];

    // Perform the database delete operation
    $query = "DELETE FROM experience WHERE experience_id = $experience_id";

    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'experience deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete experience']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
