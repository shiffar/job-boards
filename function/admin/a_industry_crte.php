<?php
include'../../connection.php';

// Retrieve data from the form
$industry = $_POST["industry"];

// Insert the data into the database
$sql = "INSERT INTO industry (industry, crte_dte)
        VALUES ('$industry', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
