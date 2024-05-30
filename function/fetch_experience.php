<?php
// Include your database connection code here
include '../connection.php';

// Query to fetch experience from the database (select only relevant columns)
$query = "SELECT `experience_id`, `experience` FROM `experience`";

$result = mysqli_query($conn, $query);

if ($result) {
    $experience = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $experience[] = $row;
    }
    echo json_encode($experience);
} else {
    echo json_encode(array('error' => 'Failed to fetch experience'));
}

// Close the database connection
mysqli_close($conn);
?>
