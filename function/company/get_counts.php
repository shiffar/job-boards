<?php
session_start();

if (isset($_SESSION['jp_id'])) {
    $user_id = $_SESSION['jp_id'];

    // Connect to your database (Replace with your database connection code)
    $conn = mysqli_connect("localhost", "root", "", "workman");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to get the company ID using the user ID
    $query = "SELECT `ci_id` FROM `company_info` WHERE `user_id` = $user_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $company_id = $row['ci_id'];

        // Query to get post job count
        $job_count_query = "SELECT COUNT(*) AS job_count FROM `post_jobs` WHERE `company_id` = $company_id";
        $job_count_result = mysqli_query($conn, $job_count_query);
        $job_count_row = mysqli_fetch_assoc($job_count_result);
        $post_job_count = $job_count_row['job_count'];

        // Query to get application count
        $application_count_query = "SELECT SUM(`applications`) AS application_count FROM `post_jobs` WHERE `company_id` = $company_id";
        $application_count_result = mysqli_query($conn, $application_count_query);
        $application_count_row = mysqli_fetch_assoc($application_count_result);
        $application_count = $application_count_row['application_count'];

        // Close the database connection
        mysqli_close($conn);

        // Return the counts as a JSON response
        $response = array(
            'post_job_count' => $post_job_count,
            'application_count' => $application_count
        );

        echo json_encode($response);
    } else {
        echo "Company not found!";
    }
} else {
    echo "Session not set.";
}
?>
