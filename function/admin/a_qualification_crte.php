<?php
include'../../connection.php';

// Retrieve data from the form
$qualification = $_POST["qualification"];

// Insert the data into the database
$sql = "INSERT INTO qualification (qualification, crte_dte)
        VALUES ('$qualification', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
