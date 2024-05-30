<?php
session_start();
include '../../connection.php';

// Check if the session 'user_id' is available, and if not, fall back to $_GET['js_id']
if (isset($_SESSION['js_id'])) {
    $js_id2 = $_SESSION['js_id'];
} elseif (isset($_GET['js_id'])) {
    $js_id2 = $_GET['js_id'];
} else {
    // 'js_id' is neither in session nor in GET request
    echo json_encode(array());
    exit; // Exit the script if 'js_id' is not available
}

// Connect to your database (replace these with your actual database credentials)
// ...

// Construct the SQL query to select award data
$sql = "SELECT `awrd_id`, `user_id`, `award_title`, `start_year`, `end_year`, `award_description`, `crte_dte`, `updte_dte` FROM `awards` WHERE `user_id` = " . $js_id2;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $award_data = array();

    while ($row = $result->fetch_assoc()) {
        $award_data[] = $row;
    }

    // Return the data as JSON
    echo json_encode($award_data);
} else {
    // No data found
    echo json_encode(array());
}

// Close the database connection
$conn->close();
?>
