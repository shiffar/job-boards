<?php
include'../../connection.php';

// Retrieve data from the form
$provinces = $_POST["provinces"];

// Insert the data into the database
$sql = "INSERT INTO provinces (provinces, crte_dte)
        VALUES ('$provinces', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
