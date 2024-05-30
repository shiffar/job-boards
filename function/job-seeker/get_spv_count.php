<?php
session_start();
$user_id = $_SESSION["js_id"];
include '../../connection.php';

// SQL query to join the tables and filter by user_id
$sql = "SELECT *
FROM `count_sp_view` AS csv
INNER JOIN `job_seeker` AS js ON csv.`js_id` = js.`js_id`
WHERE js.`js_id` = '$user_id'";
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

