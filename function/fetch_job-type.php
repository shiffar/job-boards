<?php
// Include your database connection code here
include '../connection.php';

// Query to fetch job_type from the database (select only relevant columns)
$query = "SELECT `job_type_id`, `job_type` FROM `job_type`";

$result = mysqli_query($conn, $query);

if ($result) {
    $job_type = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $job_type[] = $row;
    }
    echo json_encode($job_type);
} else {
    echo json_encode(array('error' => 'Failed to fetch job_type'));
}

// Close the database connection
mysqli_close($conn);
?>
