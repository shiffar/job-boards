<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Connect to your MySQL database
    include '../../connection.php';

    // Get user's ID (you may use the logged-in user's ID)
    $user_id = $_SESSION['js_id'];

    // Retrieve the old password from the database
    $old_password = $_POST['old_password'];

    // Verify the old password (you may use password_verify or your validation logic)

    // If old password is verified, update the password
    $new_password = $_POST['new_password'];
    $updateQuery = "UPDATE job_seeker SET pswrd = '$new_password' WHERE js_id = $user_id";

    if (mysqli_query($conn, $updateQuery)) {
        echo 'success';
    } else {
        echo 'error';
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo 'error';
}
?>
