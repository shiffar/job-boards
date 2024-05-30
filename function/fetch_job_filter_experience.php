<?php
include'../connection.php';

// Construct a SQL query to fetch data from your 'experience' table
$sql = "SELECT `experience_id`, `experience`, `crte_dte`, `updte_dte` FROM `experience`";

// Execute the query and fetch the data
$result = mysqli_query($conn, $sql);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Return the data as JSON
echo json_encode($data);
?>
