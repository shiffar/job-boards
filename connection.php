<?php
// Database connection parameters
$host = "sql.freedb.tech";
$username = "freedb_shiffar";
$password = "dp9aVH?9fvpb4eP";
$database = "freedb_workman";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
