<?php
session_start();
// Include your database connection code here
include '../../connection.php';

// Check if a session ID (user ID) is available
if (isset($_SESSION['js_id'])) {
    $userId = $_SESSION['js_id'];

    // SQL query to fetch pi_id based on the user ID
    $query = "SELECT `pi_id` FROM `profile_info` WHERE user_id = '$userId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Fetch the pi_id
        $row = mysqli_fetch_assoc($result);
        $piId = $row['pi_id'];

        // SQL query to fetch data based on the pi_id
        $query2 = "SELECT * FROM post_jobs AS pj
        LEFT JOIN company_info AS ci ON pj.company_id = ci.ci_id
        LEFT JOIN job_applied AS ja ON pj.job_id = ja.job_id_fk
        WHERE ja.app_user_id = '$piId'";

        $result2 = mysqli_query($conn, $query2);

        if ($result2) {
            $jobs = [];
            while ($row = mysqli_fetch_assoc($result2)) {
                $jobs[] = $row;
            }
            echo json_encode($jobs);
        } else {
            echo json_encode(['error' => 'Failed to fetch data']);
        }
    } else {
        echo json_encode(['error' => 'Failed to fetch pi_id']);
    }
} else {
    echo json_encode(['error' => 'Session ID not available']);
}
?>
