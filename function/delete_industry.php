<?php
include'../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $industry_id = $_POST['eindustry_id'];

    // Perform the database delete operation
    $query = "DELETE FROM industry WHERE industry_id = $industry_id";

    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'industry deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete industry']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
