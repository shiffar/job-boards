<?php
// Database connection parameters
include'../../connection.php';
// Fetch data from job_provider and company_info tables
$query = "SELECT * FROM specialisms";

$result = $conn->query($query);

if ($result) {
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Encode the data as JSON and return it
    echo json_encode($data);

    // Close the database connection
    $conn->close();
} else {
    // Handle any errors here
    echo "Error: " . $conn->error;
}
?>
