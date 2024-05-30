<?php
include'../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $provinces_id = $_POST['eprovinces_id'];

    // Perform the database delete operation
    $query = "DELETE FROM provinces WHERE provinces_id = $provinces_id";

    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'provinces deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete provinces']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
