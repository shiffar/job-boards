<?php
session_start();
// Include your database connection code here
include '../../connection.php';

if (isset($_GET['job_id'])) {
    $jobID = $_GET['job_id'];

    // SQL query to fetch job details based on the job ID
    $query = "SELECT * FROM post_jobs WHERE job_id = '$jobID'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $jobData = mysqli_fetch_assoc($result);
        echo json_encode($jobData);
    } else {
        echo json_encode(['error' => 'Failed to fetch job data']);
    }
} else {
    echo json_encode(['error' => 'Job ID not provided']);
}
?>
