<?php
session_start();
require_once("../../connection.php"); // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION["js_id"])) {
        $user_id = $_SESSION["js_id"];
    } else if (isset($_POST["js_id"])) { // Change $_POST["jp_id"] to $_POST["js_id"]
        $user_id = $_POST["js_id"];
    } else {
        echo json_encode(array()); // Return an empty JSON object if user_id is not set in the session or post data
        exit; // Exit the script to prevent further execution
    }

    $sql = "SELECT * FROM `profile_info` AS pi
            LEFT JOIN `profile_social_media` AS psm ON pi.`pi_id` = psm.`profile_id`
            LEFT JOIN `profile_contact_info` AS pci ON pi.`pi_id` = pci.`profile_id`
            LEFT JOIN `cvs` AS cv ON pi.`user_id` = cv.`user_id`
            WHERE pi.`user_id` = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array()); // Return an empty JSON object if no data found
    }

    $stmt->close();
}
?>
