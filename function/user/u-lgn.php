<?php
session_start();
require_once("../../connection.php"); // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check in the job_seeker table
    $sql_seeker = "SELECT * FROM job_seeker WHERE `u_nm` = ? AND `pswrd` = ?";
    $stmt_seeker = $conn->prepare($sql_seeker);
    $stmt_seeker->bind_param("ss", $username, $password);
    $stmt_seeker->execute();
    $result_seeker = $stmt_seeker->get_result();
    $row_seeker = $result_seeker->fetch_assoc();

    // Check in the job_provider table
    $sql_provider = "SELECT * FROM job_provider WHERE `u_nm` = ? AND `pswrd` = ?";
    $stmt_provider = $conn->prepare($sql_provider);
    $stmt_provider->bind_param("ss", $username, $password);
    $stmt_provider->execute();
    $result_provider = $stmt_provider->get_result();
    $row_provider = $result_provider->fetch_assoc();

    if ($row_seeker) {
        // Job Seeker found, set session variable and redirect to seeker dashboard
        $_SESSION["js_id"] = $row_seeker["js_id"];
        $_SESSION["user_type"] = "seeker";

        // Check if the profile image is available
        $sql_profile_info = "SELECT `profile_image_path` FROM `profile_info` WHERE `user_id` = ?";
        $stmt_profile_info = $conn->prepare($sql_profile_info);
        $stmt_profile_info->bind_param("i", $_SESSION["js_id"]);
        $stmt_profile_info->execute();
        $result_profile_info = $stmt_profile_info->get_result();
        $row_profile_info = $result_profile_info->fetch_assoc();

        if ($row_profile_info && !empty($row_profile_info["profile_image_path"])) {
            $_SESSION["profile_image_path"] = $row_profile_info["profile_image_path"];
        } else {
            // Set a default profile image path or handle it as needed
            $_SESSION["profile_image_path"] = "no-pi.png";
        }

        if (isset($_POST['remember-me'])) {
            // Set a cookie with the username that expires in 7 days (adjust as needed)
            setcookie('remembered_username', $username, time() + (7 * 24 * 60 * 60), "/");
        } else {
            // If "Remember Me" is not checked, delete the cookie if it exists
            setcookie('remembered_username', "", time() - 3600, "/");
        }

        echo "candidate-dashboard.php"; // Return the dashboard URL
        exit();
    } elseif ($row_provider) {
        // Job Provider found, set session variable and redirect to provider dashboard
        $_SESSION["jp_id"] = $row_provider["jp_id"];
        $_SESSION["user_type"] = "provider";

        // Check if the company logo is available
        $sql_company_info = "SELECT `logo` FROM `company_info` WHERE `user_id` = ?";
        $stmt_company_info = $conn->prepare($sql_company_info);
        $stmt_company_info->bind_param("i", $_SESSION["jp_id"]);
        $stmt_company_info->execute();
        $result_company_info = $stmt_company_info->get_result();
        $row_company_info = $result_company_info->fetch_assoc();

        if ($row_company_info && !empty($row_company_info["logo"])) {
            $_SESSION["logo"] = $row_company_info["logo"];
        } else {
            // Set a default logo or handle it as needed
            $_SESSION["logo"] = "no-pi.png";
        }

        if (isset($_POST['remember-me'])) {
            // Set a cookie with the username that expires in 7 days (adjust as needed)
            setcookie('remembered_username', $username, time() + (7 * 24 * 60 * 60), "/");
        } else {
            // If "Remember Me" is not checked, delete the cookie if it exists
            setcookie('remembered_username', "", time() - 3600, "/");
        }

        echo "job-provider-dashboard.php"; // Return the dashboard URL
        exit();
    } else {
        // Invalid username or password, handle error accordingly
        echo "Invalid login credentials.";
    }

    $stmt_seeker->close();
    $stmt_provider->close();
}
?>
