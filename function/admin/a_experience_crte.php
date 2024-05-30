<?php
include'../../connection.php';

// Retrieve data from the form
$experience = $_POST["experience"];

// Insert the data into the database
$sql = "INSERT INTO experience (experience, crte_dte)
        VALUES ('$experience', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
