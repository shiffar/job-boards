<?php
include'../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cities_id = $_POST['ecities_id'];

    // Perform the database delete operation
    $query = "DELETE FROM cities WHERE cities_id = $cities_id";

    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'city deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete city']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
