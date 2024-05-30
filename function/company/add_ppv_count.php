<?php
include '../../connection.php';

if (isset($_POST['action']) && $_POST['action'] === 'increment' && isset($_POST['companyid'])) {
    $company_id = $_POST['companyid'];
    $currentDate = date('Y-m-d');

    $checkSql = "SELECT * FROM count_pp_view WHERE date_added = ? AND company_id = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("ss", $currentDate, $company_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If a record for the current date and company ID exists, update the count
        $updateSql = "UPDATE count_pp_view SET count_value = count_value + 1 WHERE date_added = ? AND company_id = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("ss", $currentDate, $company_id);
        $stmt->execute();
    } else {
        // If no record for the current date and company ID exists, insert a new record
        $insertSql = "INSERT INTO count_pp_view (count_value, date_added, company_id) VALUES (1, ?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("ss", $currentDate, $company_id);
        $stmt->execute();
    }
}

$conn->close();
?> 