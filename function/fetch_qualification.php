<?php
// Include your database connection code here
include '../connection.php';

// Query to fetch qualification from the database (select only relevant columns)
$query = "SELECT `qualification_id`, `qualification` FROM `qualification`";

$result = mysqli_query($conn, $query);

if ($result) {
    $qualification = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $qualification[] = $row;
    }
    echo json_encode($qualification);
} else {
    echo json_encode(array('error' => 'Failed to fetch qualification'));
}

// Close the database connection
mysqli_close($conn);
?>
