<?php
include'../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categories_id = $_POST['ecategories_id'];

    // Perform the database delete operation
    $query = "DELETE FROM categories WHERE categories_id = $categories_id";

    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Category deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete category']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
