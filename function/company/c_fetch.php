<?php
session_start();
require_once("../../connection.php"); // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have stored the user's session ID in a session variable
    if (isset($_SESSION["jp_id"])) {
        $user_id = $_SESSION["jp_id"];

        $sql = "SELECT `ci_id`, `user_id`, `logo`, `cover_image`, `company_name`, `email`, `phone`, `website`, `established_date`, `team_size`, `categories`, `allow_in_search`, `about_company` FROM `company_info` WHERE `user_id` = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            
            // Convert the categories string to an array
            $categories = explode(',', $row['categories']);
            $row['categories'] = $categories;
            
            echo json_encode($row);
        } else {
            echo json_encode(array()); // Return an empty JSON object if no data found
        }
        
        $stmt->close();
    } else {
        echo json_encode(array()); // Return an empty JSON object if user_id is not set in the session
    }
}

?>
