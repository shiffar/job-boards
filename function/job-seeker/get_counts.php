<?php
session_start();
include '../../connection.php';

if (!isset($_SESSION['js_id'])) {
    // Handle the case when the user is not logged in
    echo json_encode(array("error" => "User is not logged in."));
    exit; // Terminate the script
}

// Get the user's ID from the session
$userId = $_SESSION['js_id'];

// Query to get the user's profile ID
$query = "SELECT `pi_id` FROM `profile_info` WHERE user_id = '$userId'";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $piId = $row['pi_id'];

    // Query to count applied jobs for the user
    $countSQL = "SELECT COUNT(*) AS applied_job_count FROM job_applied WHERE app_user_id = '$piId'";
    $result = $conn->query($countSQL);

    if ($result) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();

        // Extract the applied_job_count from the result
        $applied_job_count = $row['applied_job_count'];

        // Return the count as JSON
        echo json_encode(array("applied_job_count" => $applied_job_count));
    } else {
        // Handle the error
        echo json_encode(array("error" => "Error fetching data."));
    }
} else {
    // Handle the error
    echo json_encode(array("error" => "Error fetching profile ID."));
}

// Close the database connection
$conn->close();
?>
