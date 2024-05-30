<?php
session_start();
include '../../connection.php'; // Include your database connection script.

if (isset($_SESSION["jp_id"])) {
    $user_id = $_SESSION["jp_id"];

    // Use prepared statements to prevent SQL injection.
    $query = "SELECT p.job_title, COUNT(j.job_id_fk) as application_count
              FROM post_jobs p
              LEFT JOIN job_applied j ON p.job_id = j.job_id_fk
              LEFT JOIN company_info ci ON p.company_id = ci.ci_id
              LEFT JOIN job_provider jp ON ci.user_id = jp.jp_id
              LEFT JOIN job_seeker js ON js.js_id = j.app_user_id
              WHERE jp.jp_id = ?
              GROUP BY p.job_title";

    // Prepare the SQL statement and bind the user_id parameter.
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Prepare data for JSON encoding.
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Close the prepared statement.
    $stmt->close();
} else {
    // Handle the case when the session variable is not set.
    $data = array(); // Return an empty array or an error message as needed.
}

// Return the data as JSON.
echo json_encode($data);

// Close the database connection.
$conn->close();
?>

