<?php
session_start();

if (isset($_POST['user_id'])) {
    $_SESSION['jp_id'] = $_POST['user_id'];
    
    // Connect to your MySQL database
    include '../../connection.php';

    // Retrieve the logo from the company_info table
    $jp_id = $_SESSION['jp_id'];
    $sql = "SELECT logo FROM company_info WHERE user_id = $jp_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['logo'] = $row['logo'];
        
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
