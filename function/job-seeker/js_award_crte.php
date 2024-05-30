<?php
session_start();
include'../../connection.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_SESSION['js_id'])) {
        // Retrieve data from the POST request
        $UserId = $_SESSION['js_id'];
        $awardTitle = $_POST['award_title'];
        $startYear = $_POST['award_start_year'];
        $endYear = $_POST['award_end_year'];
        $awardDescription = $_POST['award_description'];

        // Insert data into the database
        $sql = "INSERT INTO awards (user_id, award_title, start_year, end_year, award_description, crte_dte) VALUES ('$UserId', '$awardTitle', '$startYear', '$endYear', '$awardDescription', NOW())";

        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    

    // Close the connection
    $conn->close();
}
?>
