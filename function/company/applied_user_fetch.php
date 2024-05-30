<?php
session_start();
include '../../connection.php'; // Include your database connection script.

if (isset($_GET['job_title'])) {
    $jobTitle = $_GET['job_title'];

    // Retrieve company_id based on the session's jp_id
    if (isset($_SESSION['jp_id'])) {
        $jpId = $_SESSION['jp_id'];

        $companyQuery = "SELECT ci_id FROM company_info WHERE user_id = ?";
        $companyStmt = $conn->prepare($companyQuery);
        $companyStmt->bind_param("i", $jpId);
        $companyStmt->execute();
        $companyResult = $companyStmt->get_result();
        $companyData = $companyResult->fetch_assoc();
        $companyStmt->close();

        if (isset($companyData['ci_id'])) {
            $companyId = $companyData['ci_id'];

            // Query to fetch data
            $query = "SELECT 
                      pi.job_title AS current_job_title, 
                      pi.full_name,
                      pi.profile_image_path,
                      pi.current_salary,
                      pci.city AS js_city,
                      pci.country AS js_country,
                      c.skills,
                      js.js_id,
                      j.job_id_fk 
                      FROM post_jobs p
                      LEFT JOIN job_applied j ON p.job_id = j.job_id_fk
                      LEFT JOIN profile_info pi ON pi.pi_id = j.app_user_id
                      LEFT JOIN job_seeker js ON pi.user_id = js.js_id
                      LEFT JOIN profile_contact_info pci ON pi.pi_id = pci.profile_id 
                      LEFT JOIN cvs c ON js.js_id = c.user_id
                      WHERE p.job_title = ? AND p.company_id = ?
                      GROUP BY js.js_id";

            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $jobTitle, $companyId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                $stmt->close();
                // Return the data as JSON.
                echo json_encode($data);
            } else {
                // Handle any errors here, e.g., return an error message.
                echo json_encode(array("error" => "An error occurred."));
            }
        } else {
            // Handle the case when company_id is not found.
            echo json_encode(array("error" => "Company ID not found."));
        }
    } else {
        // Handle the case when jp_id is not found in the session.
        echo json_encode(array("error" => "User ID not found in the session."));
    }
} else {
    // Handle the case when job_title parameter is not set.
    $data = array(); // Return an empty array or an error message as needed.
}
?>
