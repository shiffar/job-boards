<?php
session_start();
include '../../connection.php';
$response = array();

// Check if the user is logged in
if (isset($_SESSION['js_id'])) {
    // Get job_id and appUserId from POST
    $job_id = $_POST['job_id2']; // You need to pass the job_id through AJAX
    $appUserId = $_SESSION['js_id'];

    // Query the profile_info table to get pi_id
    $checkSql1 = "SELECT pi_id FROM profile_info WHERE user_id = $appUserId";
    $checkResult1 = $conn->query($checkSql1);

    if ($checkResult1) {
        $row1 = $checkResult1->fetch_assoc();
        $pi_id = $row1['pi_id'];

        // Check if the user has already applied for the same job
        $checkSql = "SELECT 1 FROM job_applied WHERE job_id_fk = $job_id AND app_user_id = $pi_id";
        $checkResult = $conn->query($checkSql);

        if ($checkResult->num_rows > 0) {
            // User has already applied for this job, show an alert
            $response['success'] = false;
            $response['message'] = 'You have already applied for this job.';
        } else {
            // User hasn't applied for this job, insert the new record
            // Construct the SQL query
            $sql = "INSERT INTO job_applied (job_id_fk, app_user_id, app_dte) VALUES ($job_id, $pi_id, NOW())";

            // Execute the query
            if ($conn->query($sql) === TRUE) {
                // Increment the applications count in the post_jobs table
                $updateSql = "UPDATE post_jobs SET applications = applications + 1 WHERE job_id = $job_id";
                if ($conn->query($updateSql) === TRUE) {
                    $response['success'] = true;
                    $response['message'] = 'Job applied successfully.';
                } else {
                    $response['success'] = false;
                    $response['message'] = 'Error updating applications count: ' . $conn->error;
                }
            } else {
                $response['success'] = false;
                $response['message'] = 'Error inserting data: ' . $conn->error;
            }
        }
    } else {
        // Handle any errors when querying the profile_info table
        $response['success'] = false;
        $response['message'] = 'Error querying the profile_info table: ' . $conn->error;
    }

    $conn->close();
} else {
    // Session is not available, return an error message
    $response['success'] = false;
    $response['message'] = 'Please log in to apply for the job.';
}

echo json_encode($response);
?>
