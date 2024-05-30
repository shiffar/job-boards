<?php
// Include your database connection code here
include '../connection.php';

// Query to fetch provinces from the database (select only relevant columns)
$query = "SELECT `provinces_id`, `provinces` FROM `provinces`";

$result = mysqli_query($conn, $query);

if ($result) {
    $provinces = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $provinces[] = $row;
    }
    echo json_encode($provinces);
} else {
    echo json_encode(array('error' => 'Failed to fetch provinces'));
}

// Close the database connection
mysqli_close($conn);
?>
