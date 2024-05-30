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

// Get contact information from the POST request
$country = $_POST['country'];
$city = $_POST['city'];
$complete_address = $_POST['complete_address'];
$find_on_map = $_POST['find_on_map'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Check if a record with the given user_id exists in profile_info
$selectProfileSQL = "SELECT pi_id FROM profile_info WHERE user_id = '$user_id'";
$result = $conn->query($selectProfileSQL);

if ($result->num_rows > 0) {
    // A record with the user_id exists in profile_info
    $row = $result->fetch_assoc();
    $pi_id = $row['pi_id'];

    // Check if a record with the same profile_id exists in profile_contact_info
    $selectContactSQL = "SELECT profile_id FROM profile_contact_info WHERE profile_id = '$pi_id'";
    $resultContact = $conn->query($selectContactSQL);

    if ($resultContact->num_rows > 0) {
        // Update the existing record in profile_contact_info
        $updateSQL = "UPDATE profile_contact_info 
                      SET 
                          country = '$country',
                          city = '$city',
                          complete_address = '$complete_address',
                          find_on_map = '$find_on_map',
                          latitude = '$latitude',
                          longitude = '$longitude'
                      WHERE profile_id = '$pi_id'";
        
        if ($conn->query($updateSQL)) {
            echo 'Contact information updated successfully';
        } else {
            echo "Error updating contact information: " . $conn->error;
        }
    } else {
        // Insert contact information into profile_contact_info
        $insertSQL = "INSERT INTO profile_contact_info (profile_id, country, city, complete_address, find_on_map, latitude, longitude) 
                      VALUES ('$pi_id', '$country', '$city', '$complete_address', '$find_on_map', '$latitude', '$longitude')";
        
        if ($conn->query($insertSQL)) {
            echo 'Contact information inserted successfully.';
        } else {
            echo "Error inserting contact information: " . $conn->error;
        }
    }
} else {
    echo "No profile info found for the user.";
}

// Close the database connection
$conn->close();
?>
