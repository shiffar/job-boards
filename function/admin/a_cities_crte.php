<?php
include'../../connection.php';

// Retrieve data from the form
$cities = $_POST["cities"];

// Insert the data into the database
$sql = "INSERT INTO cities (cities, crte_dte)
        VALUES ('$cities', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
