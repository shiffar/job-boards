
<?php
//ob_start();
$servername = "bouhxnnksollonfeklxq-mysql.services.clever-cloud.com";
$username = "u2rwixdwiv9ho9ao";
$password = "6WAq1oyRZ9Fhp1yNEUBr";
$dbname = "bouhxnnksollonfeklxq";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>
