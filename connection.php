<?php
// Database connection parameters
$host = "sql101.infinityfree.com";
$username = "if0_36645368";
$password = "7jVMpQtrgm";
$database = "if0_36645368_workman";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>

