<?php
session_start();
include '../../connection.php';

if (!isset($_SESSION['jp_id'])) {
    // Handle the case when the user is not logged in
    echo "User is not logged in.";
    exit; // Terminate the script
}

// Get user_id from the session
$user_id = $_SESSION['jp_id'];

// Get job posting information from the POST request (sanitize and validate inputs as needed)
$job_title = $_POST['job_title'];
$job_description = $_POST['job_description'];
$email_address = $_POST['email_address'];
$username = $_POST['username'];
$specialisms = json_encode($_POST['specialisms']); // Save categories as JSON
$job_type = $_POST['job_type'];
$offered_salary = $_POST['offered_salary'];
$career_level = $_POST['career_level'];
$experience = $_POST['experience'];
$gender = $_POST['gender'];
$industry = $_POST['industry'];
$qualification = $_POST['qualification'];
$application_deadline_date = $_POST['application_deadline_date'];
$country = $_POST['country'];
$city = $_POST['city'];
$complete_address = $_POST['complete_address'];
$find_on_map = $_POST['find_on_map'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$status = 'Active';

// Insert job posting information into the post_jobs table
$insertSQL = "INSERT INTO post_jobs (company_id, job_title, job_description, email_address, username, specialisms, job_type, offered_salary, career_level, experience, gender, industry, qualification, application_deadline_date, jp_country, jp_city, complete_address, find_on_map, jp_latitude, jp_longitude,crte_dte, status) 
              VALUES (
                  (SELECT ci_id FROM company_info WHERE user_id = '$user_id'), 
                  '$job_title', '$job_description', '$email_address', '$username', '$specialisms', '$job_type', '$offered_salary', '$career_level', '$experience', '$gender', '$industry', '$qualification', '$application_deadline_date', '$country', '$city', '$complete_address', '$find_on_map', '$latitude', '$longitude', NOW(), '$status'
              )";

if ($conn->query($insertSQL)) {
    echo "Job posting information inserted successfully.";
} else {
    echo "Error inserting job posting information: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
