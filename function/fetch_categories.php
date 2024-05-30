<?php
// Include your database connection code here
include'../connection.php';
// Query to fetch categoriess from the database
$query = "SELECT `categories_id`, `categories` FROM `categories`";

$result = mysqli_query($conn, $query);

if ($result) {
    $categories = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }
    echo json_encode($categories);
} else {
    echo json_encode(array('error' => 'Failed to fetch categories'));
}

// Close the database conn
mysqli_close($conn);
?>
