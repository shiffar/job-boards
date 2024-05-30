<?php
// Establish a database connection (you need to replace these values with your actual database credentials)
include '../connection.php';

// SQL query to fetch job types
$sql = "SELECT `job_type_id`, `job_type`, `crte_dte`, `updte_dte` FROM `job_type` WHERE 1";
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
