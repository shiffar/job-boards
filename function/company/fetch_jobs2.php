<?php
// Establish a database connection (you need to replace these values with your actual database credentials)
include '../../connection.php';

// Get filter parameters from the POST request
$field_name = isset($_POST['field_name']) ? $_POST['field_name'] : '';
$field_location = isset($_POST['field_location']) ? $_POST['field_location'] : '';
$startDate = isset($_POST['startDate']) ? $_POST['startDate'] : '';
$endDate = isset($_POST['endDate']) ? $_POST['endDate'] : '';
$min_slry = isset($_POST['min_slry']) ? $_POST['min_slry'] : '';
$max_slry = isset($_POST['max_slry']) ? $_POST['max_slry'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : '';
$keywords = isset($_POST['keywords']) ? $_POST['keywords'] : '';
$location2 = isset($_POST['location2']) ? $_POST['location2'] : '';
$specialisms = isset($_POST['specialisms']) ? $_POST['specialisms'] : '';
$jobTypes = isset($_POST['jobTypes']) ? $_POST['jobTypes'] : [];
$datePostedFilter = isset($_POST['datePostedFilter']) ? $_POST['datePostedFilter'] : '';
$experienceLevelFilter = isset($_POST['experienceLevelFilter']) ? $_POST['experienceLevelFilter'] : '';

// Create and execute the SQL query to join the tables and filter based on parameters
$sql = "SELECT * FROM `company_info` ci
        JOIN `post_jobs` pj ON ci.`ci_id` = pj.`company_id`
        WHERE pj.`job_title` LIKE '%$field_name%'
        AND pj.`status` = 'Active'
        AND ci.`allow_in_search` = 'Yes'";


// Add location filter if provided
if (!empty($field_location)) {
    $sql .= " AND (pj.`jp_city` LIKE '%$field_location%' OR pj.`jp_country` LIKE '%$field_location%')";
}

if (!empty($startDate) && !empty($endDate)) {
    $sql .= " AND DATE(pj.crte_dte) BETWEEN '$startDate' AND '$endDate'";
}

if (!empty($min_slry) && !empty($max_slry)) {
    // Extract numeric part of salary and compare it within the range
    $sql .= " AND (CAST(SUBSTRING(pj.offered_salary, 2) AS SIGNED) BETWEEN $min_slry AND $max_slry)";
}

if (!empty($location)) {
    $sql .= " AND (pj.jp_country LIKE '%$location%' OR pj.jp_city LIKE '%$location%')";
}

if (!empty($category)) {
    $sql .= " AND pj.categories LIKE '%$category%'";
}

if (!empty($keywords)) {
    $sql .= " AND (pj.job_title LIKE '%$keywords%' OR pj.job_description LIKE '%$keywords%' OR ci.company_name LIKE '%$keywords%')";
}

if (!empty($location2)) {
    $sql .= " AND (pj.jp_country LIKE '%$location2%' OR pj.jp_city LIKE '%$location2%')";
}

if (!empty($specialisms)) {
    $sql .= " AND pj.specialisms LIKE '%$specialisms%'";
}

if (!empty($jobTypes)) {
    $jobTypesFilter = implode("', '", $jobTypes);
    $sql .= " AND pj.job_type IN ('$jobTypesFilter')";
}

if (!empty($jobTypes)) {
    // Escape and sanitize each value in the $jobTypes array
    $jobTypes = array_map(function ($value) use ($conn) {
        return mysqli_real_escape_string($conn, $value);
    }, $jobTypes);

    $jobTypesFilter = implode("', '", $jobTypes);
    $sql .= " AND pj.job_type IN ('$jobTypesFilter')";
}


// Apply Date Posted filter
if (!empty($datePostedFilter)) {
    switch ($datePostedFilter) {
        case 'last24hours':
            $sql .= " AND TIMESTAMPDIFF(HOUR, pj.crte_dte, NOW()) <= 24";
            break;
        case 'last7days':
            $sql .= " AND TIMESTAMPDIFF(DAY, pj.crte_dte, NOW()) <= 7";
            break;
        case 'last14days':
            $sql .= " AND TIMESTAMPDIFF(DAY, pj.crte_dte, NOW()) <= 14";
            break;
        case 'last30days':
            $sql .= " AND TIMESTAMPDIFF(DAY, pj.crte_dte, NOW()) <= 30";
            break;
        // For 'All', no additional filter needed
    }
}

if (!empty($experienceLevelFilter)) {
    // Assuming 'specialisms' field holds the experience level information
    $sql .= " AND FIND_IN_SET(pj.experience, '$experienceLevelFilter') > 0";
}

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Return the data as JSON
echo json_encode($data);

// Close the database connection
mysqli_close($conn);
?>
