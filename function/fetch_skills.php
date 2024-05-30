<?php
// Include your database connection code here
include'../connection.php';
// Query to fetch skills from the database
$query = "SELECT `skill_id`, `skill` FROM `skill`";

$result = mysqli_query($conn, $query);

if ($result) {
    $skills = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $skills[] = $row;
    }
    echo json_encode($skills);
} else {
    echo json_encode(array('error' => 'Failed to fetch skills'));
}

// Close the database conn
mysqli_close($conn);
?>
