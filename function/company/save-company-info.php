<?php
session_start();

if (!isset($_SESSION['jp_id'])) {
  // Handle the case when the user is not logged in
  die("User is not logged in.");
}

// Get user_id from the session
$user_id = $_SESSION['jp_id'];
$company_name = $_POST['company_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$website = $_POST['website'];
$established_date = $_POST['established_date'];
$team_size = $_POST['team_size'];
$categories_json = isset($_POST['categories']) ? json_encode($_POST['categories']) : '[]';
$allow_in_search = $_POST['allow_in_search'];
$about_company = $_POST['about_company'];

// Create a MySQLi connection
$mysqli = new mysqli("localhost", "root", "", "workman");

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

// Function to handle multiple file uploads
function uploadFiles($files, $upload_dir) {
    $uploaded_files = array();

    foreach ($files['tmp_name'] as $index => $file_tmp) {
        $file_name = $files['name'][$index];

        // Generate a unique filename to avoid overwriting existing files
        $new_file_name = uniqid() . '_' . $file_name;
        $destination = $upload_dir . $new_file_name;

        if (move_uploaded_file($file_tmp, $destination)) {
            $uploaded_files[] = $new_file_name;
        }
    }

    return $uploaded_files;
}

// Build the SQL SELECT query to check if user_id exists
$select_query = "SELECT user_id, logo, cover_image FROM company_info WHERE user_id = '$user_id'";

// Execute the SELECT query
$result = $mysqli->query($select_query);

// Check if a record with the same user_id already exists
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  
  // Handle file uploads for logo and cover_image
  $logo_upload_dir = 'uploads/logo/'; // Directory for logo uploads
  $cover_upload_dir = 'uploads/cover/'; // Directory for cover image uploads

  // Check if the upload directories exist, and create them if not
  if (!file_exists($logo_upload_dir)) {
    mkdir($logo_upload_dir, 0777, true);
  }

  if (!file_exists($cover_upload_dir)) {
    mkdir($cover_upload_dir, 0777, true);
  }

  // Update the existing record
  $logo = implode(', ', uploadFiles($_FILES['logo_attachments'], $logo_upload_dir));
  $cover_image = implode(', ', uploadFiles($_FILES['cover_attachments'], $cover_upload_dir));

  // If new logo and cover images are uploaded, update the filenames
  if (!empty($logo)) {
    $row['logo'] = $logo;
  }

  if (!empty($cover_image)) {
    $row['cover_image'] = $cover_image;
  }

  // Build the SQL UPDATE query with interpolated values
  $update_sql = "UPDATE company_info SET
    logo = '{$row['logo']}',
    cover_image = '{$row['cover_image']}',
    company_name = '$company_name',
    email = '$email',
    phone = '$phone',
    website = '$website',
    established_date = '$established_date',
    team_size = '$team_size',
    categories = '$categories_json',
    allow_in_search = '$allow_in_search',
    about_company = '$about_company'
    WHERE user_id = '$user_id'";

  // Execute the UPDATE query
  if ($mysqli->query($update_sql)) {
    echo "Data updated successfully.";
  } else {
    echo "Error updating data: " . $mysqli->error;
  }
} else {
  // Handle file uploads for logo and cover_image (as you did in your code)
  $logo_upload_dir2 = 'uploads/logo/'; // Directory for logo uploads
  $cover_upload_dir2 = 'uploads/cover/';
  // Define the variables for logo and cover_image
  $logo = implode(', ', uploadFiles($_FILES['logo_attachments'], $logo_upload_dir2));
  $cover_image = implode(', ', uploadFiles($_FILES['cover_attachments'], $cover_upload_dir2));

  // Build the SQL INSERT query with interpolated values
  $insert_sql = "INSERT INTO company_info (user_id, logo, cover_image, company_name, email, phone, website, established_date, team_size, categories, allow_in_search, about_company) 
          VALUES ('$user_id', '$logo', '$cover_image', '$company_name', '$email', '$phone', '$website', '$established_date', '$team_size', '$categories_json', '$allow_in_search', '$about_company')";

  // Execute the INSERT query
  if ($mysqli->query($insert_sql)) {
    echo "Data inserted successfully.";
  } else {
    echo "Error inserting data: " . $mysqli->error;
  }
}

// Close the database connection
$mysqli->close();
?>
