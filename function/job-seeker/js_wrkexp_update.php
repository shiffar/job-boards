<?php
include'../../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the updated data sent via POST
    $wrkexp_id = $_POST['wrkexp_id'];
    $company_name = $_POST['company_name'];
    $job_title = $_POST['job_title'];
    $description = $_POST['wrkexp_description'];
    $start_year = $_POST['wrkexp_start_year'];
    $end_year = $_POST['wrkexp_end_year'];

    
    // Construct the update query
    $sql = "UPDATE wrkexp
            SET company_name = '$company_name',
                job_title = '$job_title',
                start_year = '$start_year',
                end_year = '$end_year',
                description = '$description'
            WHERE wrkexp_id = $wrkexp_id";

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
