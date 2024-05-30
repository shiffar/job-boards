<?php
session_start();
include '../../connection.php';

if (!isset($_SESSION['js_id'])) {
  // Handle the case when the user is not logged in
  echo "User is not logged in.";
  exit; // Terminate the script
}

// Get social media data from the POST request
$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$linkedin = $_POST['linkedin'];
$google_plus = $_POST['google_plus'];

// Get the company_id for the current user
$user_id = $_SESSION['js_id'];
$profile_id = null;

$selectCompanySQL = "SELECT pi_id FROM profile_info WHERE user_id = '$user_id'";
$result = $conn->query($selectCompanySQL);

if ($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $profile_id = $row['pi_id'];
}

if ($profile_id !== null) {
  // Check if the social media data already exists for this company
  $selectSocialMediaSQL = "SELECT * FROM profile_social_media WHERE profile_id = '$profile_id'";
  $socialMediaResult = $conn->query($selectSocialMediaSQL);

  if ($socialMediaResult && $socialMediaResult->num_rows > 0) {
    // Social media data already exists; update the existing row
    $updateSocialMediaSQL = "UPDATE profile_social_media 
                            SET facebook = '$facebook', twitter = '$twitter', linkedin = '$linkedin', google_plus = '$google_plus' 
                            WHERE profile_id = '$profile_id'";

    if ($conn->query($updateSocialMediaSQL)) {
      echo "Social media data updated successfully.";
    } else {
      echo "Error updating social media data: " . $conn->error;
    }
  } else {
    // Social media data doesn't exist; insert a new row
    $insertSocialMediaSQL = "INSERT INTO profile_social_media (profile_id, facebook, twitter, linkedin, google_plus) 
                            VALUES ('$profile_id', '$facebook', '$twitter', '$linkedin', '$google_plus')";

    if ($conn->query($insertSocialMediaSQL)) {
      echo "Social media data inserted successfully.";
    } else {
      echo "Error inserting social media data: " . $conn->error;
    }
  }
} else {
  echo "Company not found for the current user.";
}

// Close the database connection
$conn->close();
?>
