<?php
// Include your database connection code here
include '../connection.php';

// Query to fetch industry from the database (select only relevant columns)
$query = "SELECT `industry_id`, `industry` FROM `industry`";

$result = mysqli_query($conn, $query);

if ($result) {
    $industry = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $industry[] = $row;
    }
    echo json_encode($industry);
} else {
    echo json_encode(array('error' => 'Failed to fetch industry'));
}

// Close the database connection
mysqli_close($conn);
?>
