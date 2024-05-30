<?php
session_start();
include '../../connection.php';

if (!isset($_SESSION['js_id'])) {
    // Handle the case when the user is not logged in
    echo "User is not logged in.";
    exit; // Terminate the script
}

// Get user_id from the session
$user_id = $_SESSION['js_id'];
// Get other profile information from the POST request
$full_name = $_POST['full_name'];
$job_title = $_POST['job_title'];
$phone = $_POST['phone'];
$email_address = $_POST['email_address'];
$website = $_POST['website'];
$current_salary = $_POST['current_salary'];
$expected_salary = $_POST['expected_salary'];
$experience = $_POST['experience'];
$age = $_POST['age'];
$education_levels = $_POST['education_levels'];
$languages = $_POST['languages'];
$categories = isset($_POST['categories']) ? json_encode($_POST['categories']) : '[]';
$allow_in_search_listing = $_POST['allow_in_search_listing'];
$description = $_POST['description'];

// Initialize the image name variable
$image_name = '';

// Check if a file was uploaded
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "uploads/profile/"; // Specify the folder where you want to save the images
    $target_file = $target_dir . basename($_FILES['image']['name']);

    // Move the uploaded file to the target folder
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Set the image filename
        $image_name = $_FILES['image']['name'];
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit;
    }
}

// Build the SQL SELECT query to check if user_id exists
$select_query = "SELECT pi_id, profile_image_path FROM profile_info WHERE user_id = '$user_id'";

// Execute the SELECT query
$result = $conn->query($select_query);

// Check if a record with the same user_id already exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Update the existing record with the new image and information
    $update_query = "UPDATE profile_info SET
        full_name = '$full_name',
        job_title = '$job_title',
        phone = '$phone',
        email_address = '$email_address',
        website = '$website',
        current_salary = '$current_salary',
        expected_salary = '$expected_salary',
        experience = '$experience',
        age = '$age',
        education_levels = '$education_levels',
        languages = '$languages',
        categories = '$categories',
        allow_in_search_listing = '$allow_in_search_listing',
        description = '$description'";

    // Check if a new image is provided, if so, update the image path
    if (!empty($image_name)) {
        $update_query .= ", profile_image_path = '$image_name'";
    }

    $update_query .= " WHERE user_id = '$user_id'";

    if ($conn->query($update_query)) {
        echo "Profile information updated successfully.";
    } else {
        echo "Error updating profile information: " . $conn->error;
    }
} else {
    // Insert profile information into the profile_info table, including the image file name
    $insertSQL = "INSERT INTO profile_info (user_id, profile_image_path, full_name, job_title, phone, email_address, website, current_salary, expected_salary, experience, age, education_levels, languages, categories, allow_in_search_listing, description) 
      VALUES ('$user_id', '$image_name', '$full_name', '$job_title', '$phone', '$email_address', '$website', '$current_salary', '$expected_salary', '$experience', '$age', '$education_levels', '$languages', '$categories', '$allow_in_search_listing', '$description')";

    if ($conn->query($insertSQL)) {
        echo "Profile information inserted successfully.";
    } else {
        echo "Error inserting profile information: " . $conn->error;
    }
}

$conn->close();
?>
