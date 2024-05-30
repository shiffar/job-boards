<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    // Connect to your MySQL database
    include '../../connection.php';

    // Check if the user is logged in or authorized to delete the job
    if (!isset($_SESSION['jp_id'])) {
        echo "User is not authorized to delete the job.";
        exit;
    }

    // Get the job ID to delete from the POST request
    $job_id = $_POST['job_id'];

    // Delete the corresponding records from the job_applied table
    $sqlDeleteJobApplied = "DELETE FROM job_applied WHERE job_id_fk = '$job_id'";
    if (mysqli_query($conn, $sqlDeleteJobApplied)) {
        // Continue with deleting the job from the post_jobs table
        $sqlDeleteJob = "DELETE FROM post_jobs WHERE job_id = '$job_id'";
        if (mysqli_query($conn, $sqlDeleteJob)) {
            echo "success"; // Job deleted successfully
        } else {
            echo "Error deleting the job: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting related job applications: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
