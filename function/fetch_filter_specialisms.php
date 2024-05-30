<?php
// Establish a database connection (replace with your database credentials)
include '../connection.php';

// Fetch data from the database
$sql = "SELECT specialisms_id, specialisms FROM specialisms";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Return the data as JSON
echo json_encode($data);

// Close the database connection
mysqli_close($conn);
?>
