<?php
// Include your database connection code here
include'../connection.php';
// Query to fetch citiess from the database
$query = "SELECT `cities_id`, `cities` FROM `cities`";

$result = mysqli_query($conn, $query);

if ($result) {
    $cities = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $cities[] = $row;
    }
    echo json_encode($cities);
} else {
    echo json_encode(array('error' => 'Failed to fetch cities'));
}

// Close the database conn
mysqli_close($conn);
?>
