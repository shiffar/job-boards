<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Include your database connection script
    require_once '../../connection.php';

    if (!isset($_SESSION['jp_id'])) {
        echo "User is not logged in.";
        exit;
    }

    // Get user_id from the session
    $user_id = $_SESSION['jp_id'];

    // Validate and sanitize inputs
    $job_id = $_POST["job_id"];
    $job_title = mysqli_real_escape_string($conn, $_POST['job_title']);
    $job_description = mysqli_real_escape_string($conn, $_POST['job_description']);
    $email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $specialisms = json_encode($_POST['specialisms']); // Save categories as JSON
    $job_type = mysqli_real_escape_string($conn, $_POST['job_type']);
    $offered_salary = mysqli_real_escape_string($conn, $_POST['offered_salary']);
    $career_level = mysqli_real_escape_string($conn, $_POST['career_level']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $industry = mysqli_real_escape_string($conn, $_POST['industry']);
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
    $application_deadline_date = $_POST['application_deadline_date'];
    $country = mysqli_real_escape_string($conn, $_POST['jp_country']);
    $city = mysqli_real_escape_string($conn, $_POST['jp_city']);
    $complete_address = mysqli_real_escape_string($conn, $_POST['complete_address']);
    $find_on_map = mysqli_real_escape_string($conn, $_POST['find_on_map']);
    $latitude = mysqli_real_escape_string($conn, $_POST['jp_latitude']);
    $longitude = mysqli_real_escape_string($conn, $_POST['jp_longitude']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Construct the SQL query to update the job details
    $sql = "UPDATE post_jobs SET
            job_title='$job_title', 
            job_description='$job_description',
            email_address='$email_address',
            username='$username',
            specialisms='$specialisms',
            job_type='$job_type',
            offered_salary='$offered_salary',
            career_level='$career_level',
            experience='$experience',
            gender='$gender',
            industry='$industry',
            qualification='$qualification',
            application_deadline_date='$application_deadline_date',
            jp_country='$country',
            jp_city='$city',
            complete_address='$complete_address',
            find_on_map='$find_on_map',
            jp_latitude='$latitude',
            jp_longitude='$longitude',
            status='$status'
            WHERE job_id='$job_id'";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        echo "Job updated successfully";
    } else {
        echo "Error updating job: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
