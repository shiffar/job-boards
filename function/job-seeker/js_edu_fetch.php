<?php
session_start();
include '../../connection.php';

// Check if the session 'user_id' is available, and if not, fall back to $_GET['js_id']
if (isset($_SESSION['js_id'])) {
    $js_id = $_SESSION['js_id'];
} elseif (isset($_GET['js_id'])) {
    $js_id = $_GET['js_id'];
} else {
    // 'js_id' is neither in session nor in GET request
    echo json_encode(array());
    exit; // Exit the script if 'js_id' is not available
}

// Connect to your database (replace these with your actual database credentials)
// ...

// Construct the SQL query
$sql = "SELECT * FROM `education` WHERE `user_id` = " . $js_id;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $education_data = array();

    while ($row = $result->fetch_assoc()) {
        $education_data[] = $row;
    }

    // Return the data as JSON
    echo json_encode($education_data);
} else {
    // No data found
    echo json_encode(array());
}

// Close the database connection
$conn->close();
?>
