<?php
include'../../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the updated data sent via POST
    $awrd_id = $_POST['awrd_id'];
    $award_title = $_POST['award_title'];
    $award_description = $_POST['award_description'];
    $start_year = $_POST['award_start_year'];
    $end_year = $_POST['award_end_year'];

    
    // Construct the update query
    $sql = "UPDATE awards
            SET award_title = '$award_title',
                start_year = '$start_year',
                end_year = '$end_year',
                award_description = '$award_description'
            WHERE awrd_id = $awrd_id";

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
