<?php
include'../../connection.php';

// Retrieve data from the form
$skill = $_POST["skill"];

// Insert the data into the database
$sql = "INSERT INTO skill (skill, crte_dte)
        VALUES ('$skill', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
