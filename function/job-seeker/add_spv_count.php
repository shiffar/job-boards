<?php
include '../../connection.php';

if (isset($_POST['action']) && $_POST['action'] === 'increment' && isset($_POST['jsid']) && isset($_POST['jobId'])) {
    $currentDate = date('Y-m-d');
    $js_id = $_POST['jsid'];
    $job_id = $_POST['jobId']; // Added job_id parameter

    $checkSql = "SELECT * FROM count_sp_view WHERE date_added = ? AND js_id = ? AND job_id = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("sss", $currentDate, $js_id, $job_id); // Updated to "sss"
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If a record for the current date and company ID exists, update the count
        $updateSql = "UPDATE count_sp_view SET count_value = count_value + 1 WHERE date_added = ? AND js_id = ? AND job_id = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("sss", $currentDate, $js_id, $job_id); // Updated to "sss"
        $stmt->execute();
    } else {
        // If no record for the current date and company ID exists, insert a new record
        $insertSql = "INSERT INTO count_sp_view (count_value, date_added, js_id, job_id) VALUES (1, ?, ?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("sss", $currentDate, $js_id, $job_id); // Updated to "sss"
        $stmt->execute();
    }
}

$conn->close();

?> 