<?php
session_start();
require_once("../../connection.php"); // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have stored the user's session ID in a session variable
    if (isset($_SESSION["js_id"])) {
        $user_id = $_SESSION["js_id"];
        $company_id_query = "SELECT pi_id FROM profile_info WHERE user_id = '$user_id'";
        
        $company_id_result = $conn->query($company_id_query);
        
        if ($company_id_result && $company_id_result->num_rows === 1) {
            $company_id_row = $company_id_result->fetch_assoc();
            $company_id = $company_id_row['pi_id'];
            
            $sql = "SELECT * FROM profile_contact_info WHERE profile_id = ?";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $company_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                echo json_encode($row);
            } else {
                echo json_encode(array()); // Return an empty JSON object if no data found
            }
            
            $stmt->close();
        } else {
            echo json_encode(array()); // Return an empty JSON object if no company_id found
        }
    } else {
        echo json_encode(array()); // Return an empty JSON object if user_id is not set in the session
    }
}
?>
