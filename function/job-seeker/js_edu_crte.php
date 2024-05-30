<?php
session_start();
include'../../connection.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_SESSION['js_id'])) {
        // Retrieve data from the POST request
        $UserId = $_SESSION['js_id'];
        $collegeName = $_POST['college_name'];
        $education = $_POST['education'];
        $startYear = $_POST['start_year'];
        $endYear = $_POST['end_year'];
        $description = $_POST['edu_description'];

        // Insert data into the database
        $sql = "INSERT INTO education (user_id, college_name, education, start_year, end_year, description, crte_dte) VALUES ('$UserId', '$collegeName', '$education', '$startYear', '$endYear', '$description', NOW())";

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
