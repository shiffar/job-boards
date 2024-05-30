<?php
session_start();
include'../../connection.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_SESSION['js_id'])) {
        // Retrieve data from the POST request
        $UserId = $_SESSION['js_id'];
        $jobTitle = $_POST['job_title'];
        $companyName = $_POST['company_name'];
        $startYear = $_POST['wrkexp_start_year'];
        $endYear = $_POST['wrkexp_end_year'];
        $description = $_POST['wrkexp_description'];

        // Insert data into the database
        $sql = "INSERT INTO wrkexp (user_id, company_name, job_title, start_year, end_year, description, crte_dte) VALUES ('$UserId', '$jobTitle', '$companyName', '$startYear', '$endYear', '$description', NOW())";

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
