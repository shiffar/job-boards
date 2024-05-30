<?php
include'../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $qualification_id = $_POST['equalification_id'];

    // Perform the database delete operation
    $query = "DELETE FROM qualification WHERE qualification_id = $qualification_id";

    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'qualification deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete qualification']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
