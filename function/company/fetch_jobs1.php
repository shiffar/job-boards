<?php
session_start();
// Include your database connection code here
include '../../connection.php';

// Check if a session ID (user ID) is available
if (isset($_SESSION['jp_id'])) {
    $userId = $_SESSION['jp_id'];

    // SQL query to fetch data based on the user ID
    $query = "SELECT * FROM post_jobs AS p
              LEFT JOIN company_info AS c ON p.company_id = c.ci_id
              WHERE c.user_id = '$userId'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $jobs = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $jobs[] = $row;
        }
        echo json_encode($jobs);
    } else {
        echo json_encode(['error' => 'Failed to fetch data']);
    }
} else {
    echo json_encode(['error' => 'Session ID not available']);
}
?>
