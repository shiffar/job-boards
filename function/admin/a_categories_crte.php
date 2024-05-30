<?php
include'../../connection.php';

// Retrieve data from the form
$categories = $_POST["categories"];

// Insert the data into the database
$sql = "INSERT INTO categories (categories, crte_dte)
        VALUES ('$categories', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
