<?php
require_once("../../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["job_id"])) {
        $job_id = $_POST["job_id"];

        $sql = "SELECT pj.*, ci.*, cci.*
                FROM post_jobs pj
                JOIN company_info ci ON ci.ci_id = pj.company_id
                LEFT JOIN company_contact_info cci ON cci.company_id = ci.ci_id
                WHERE pj.job_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $job_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();

                // You can format categories and other fields as needed
                $specialisms = explode(",", $row["specialisms"]);
                $formattedSpecialisms = implode(" / ", $specialisms);
                $formattedSpecialisms = str_replace(['[', ']', '"'], '', $formattedSpecialisms);
                $row["specialisms"] = $formattedSpecialisms;

                // Encode the entire $row array as JSON
                echo json_encode($row);
            } else {
                echo json_encode(array("error" => "No data found for id"));
            }

            $stmt->close();
        } else {
            echo json_encode(array("error" => "Error in preparing the SQL statement: " . $conn->error));
        }
    } else {
        echo json_encode(array("error" => "id not provided in the POST request"));
    }
}
?>
