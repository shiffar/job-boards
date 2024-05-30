<?php
include'../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $specialisms_id = $_POST['especialisms_id'];

    // Perform the database delete operation
    $query = "DELETE FROM specialisms WHERE specialisms_id = $specialisms_id";

    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'specialisms deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete specialisms']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
