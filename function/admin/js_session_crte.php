<?php
session_start();

if (isset($_POST['user_id2'])) {
    // Set the js_id in the session
    $_SESSION['js_id'] = $_POST['user_id2'];

    // Now, retrieve the profile_image_path for this user
    // Connect to your MySQL database
    include '../../connection.php';

    // Get the user's js_id from the session
    $js_id = $_SESSION['js_id'];

    // Prepare and execute a query to retrieve the profile_image_path
    $query = "SELECT profile_image_path FROM profile_info WHERE user_id = $js_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Fetch the profile_image_path from the result
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            // Set the profile_image_path as a session variable
            $_SESSION['profile_image_path'] = $row['profile_image_path'];
        }
    }

    // Close the database connection
    mysqli_close($conn);

    echo 'success';
} else {
    echo 'error';
}
?>
