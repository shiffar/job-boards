<?php
// Include your database connection code here
include('../connection.php'); // Update the file name to match your connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categories_id = $_POST['ecategories_id'];
    $newCategoryName = $_POST['ecategories'];

    // Perform the database update operation using plain SQL and MySQLi
    $query = "UPDATE categories SET categories = '" . $newCategoryName . "' WHERE categories_id = " . $categories_id;
    
    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Category updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update category']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
