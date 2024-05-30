<?php
include'../../connection.php';

// Retrieve data from the form
$job_type = $_POST["job_type"];

// Insert the data into the database
$sql = "INSERT INTO job_type (job_type, crte_dte)
        VALUES ('$job_type', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
