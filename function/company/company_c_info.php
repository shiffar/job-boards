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

// Get contact information from the POST request
$country = $_POST['country'];
$city = $_POST['city'];
$complete_address = $_POST['complete_address'];
$find_on_map = $_POST['find_on_map'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Check if the company_id already exists in the company_contact_info table
$selectCompanySQL = "SELECT ci_id FROM company_info WHERE user_id = '$user_id'";
$result = $conn->query($selectCompanySQL);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $company_id = $row['ci_id'];

    // Check if data already exists for this company
    $selectContactSQL = "SELECT * FROM company_contact_info WHERE company_id = '$company_id'";
    $contactResult = $conn->query($selectContactSQL);

    if ($contactResult && $contactResult->num_rows > 0) {
        // Data already exists; update the existing row
        $updateContactSQL = "UPDATE company_contact_info 
                            SET country = '$country', city = '$city', complete_address = '$complete_address', find_on_map = '$find_on_map', latitude = '$latitude', longitude = '$longitude' 
                            WHERE company_id = '$company_id'";

        if ($conn->query($updateContactSQL)) {
            echo "Contact information updated successfully.";
        } else {
            echo "Error updating contact information: " . $conn->error;
        }
    } else {
        // Data doesn't exist; insert a new row
        $insertContactSQL = "INSERT INTO company_contact_info (company_id, country, city, complete_address, find_on_map, latitude, longitude) 
                            VALUES ('$company_id', '$country', '$city', '$complete_address', '$find_on_map', '$latitude', '$longitude')";

        if ($conn->query($insertContactSQL)) {
            echo "Contact information inserted successfully.";
        } else {
            echo "Error inserting contact information: " . $conn->error;
        }
    }
} else {
    echo "Company not found for the current user.";
}

// Close the database connection
$conn->close();
//$insertSQL = "INSERT INTO company_contact_info (company_id, country, city, complete_address, find_on_map, latitude, longitude) 
//VALUES (
    //(SELECT id FROM company_info WHERE user_id = '$user_id'), 
    //'$country', '$city', '$complete_address', '$find_on_map', '$latitude', '$longitude'
//)";
?>


