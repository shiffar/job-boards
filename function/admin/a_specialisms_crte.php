<?php
include'../../connection.php';

// Retrieve data from the form
$specialisms = $_POST["specialisms"];

// Insert the data into the database
$sql = "INSERT INTO specialisms (specialisms, crte_dte)
        VALUES ('$specialisms', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
