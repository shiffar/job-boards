
<?php
$servername = "sql.freedb.tech";
$username = "freedb_shiffar";
$password = "dp9aVH?9fvpb4eP";
$dbname = "freedb_workman";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>

