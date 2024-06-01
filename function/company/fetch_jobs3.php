<?php

include'../../connection.php';

// Fetch job data from the database
$query = "SELECT `job_id`, `job_title`, `jp_city` FROM `post_jobs` WHERE 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $jobs = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $jobs[] = $row;
    }

    echo json_encode($jobs);
} else {
    echo "No jobs found.";
}

// Close the database connection
mysqli_close($conn);
?>
