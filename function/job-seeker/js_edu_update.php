<?php
include'../../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the updated data sent via POST
    $edu_id = $_POST['edu_id'];
    $college_name = $_POST['college_name2'];
    $education = $_POST['education2'];
    $description = $_POST['description2'];
    $start_year = $_POST['start_year2'];
    $end_year = $_POST['end_year2'];

    
    // Construct the update query
    $sql = "UPDATE education
            SET college_name = '$college_name',
                education = '$education',
                start_year = '$start_year',
                end_year = '$end_year',
                description = '$description'
            WHERE edu_id = $edu_id";

    // Execute the update query
    if ($conn->query($sql) === true) {
        $updateSuccessful = true;
    } else {
        $updateSuccessful = false;
    }

    // Close the database connection
    $conn->close();

    // Return a JSON response indicating the result of the update
    $response = ['success' => $updateSuccessful];
    echo json_encode($response);
} else {
    // Handle invalid request method
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
?>
