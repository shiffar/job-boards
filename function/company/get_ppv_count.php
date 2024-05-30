<?php
session_start();
$user_id = $_SESSION["jp_id"];
include '../../connection.php';

// SQL query to join the tables and filter by user_id
$sql = "SELECT *
FROM `count_pp_view` AS cpv
INNER JOIN `company_info` AS ci ON cpv.`company_id` = ci.`ci_id`
INNER JOIN `job_provider` AS jp ON ci.`user_id` = jp.`jp_id`
WHERE ci.`user_id` = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array('labels' => array(), 'counts' => array());

    while ($row = $result->fetch_assoc()) {
        $data['labels'][] = $row['date_added'];
        $data['counts'][] = $row['count_value'];
    }

    echo json_encode($data);
} else {
    echo json_encode(['labels' => [], 'counts' => []]);
}

$conn->close();
?>

