<?php
include'../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job_type_id = $_POST['ejob_type_id'];

    // Perform the database delete operation
    $query = "DELETE FROM job_type WHERE job_type_id = $job_type_id";

    if ($conn->query($query) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'job type deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete job type']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
