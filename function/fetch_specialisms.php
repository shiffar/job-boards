<?php
// Include your database connection code here
include '../connection.php';

// Query to fetch specialisms from the database (select only relevant columns)
$query = "SELECT `specialisms_id`, `specialisms` FROM `specialisms`";

$result = mysqli_query($conn, $query);

if ($result) {
    $specialisms = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $specialisms[] = $row;
    }
    echo json_encode($specialisms);
} else {
    echo json_encode(array('error' => 'Failed to fetch specialisms'));
}

// Close the database connection
mysqli_close($conn);
?>
