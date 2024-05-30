<?php
session_start();
include '../../connection.php';

$response = array(); // Create a response array

  $username = $_POST['u_nm'];
  $password = $_POST['pswrd'];

  // Construct the SQL query
  $query = "SELECT * FROM admin WHERE u_nm = '$username' AND pswrd = '$password'";

  // Execute the query
  $result = $conn->query($query);

  if ($result && $result->num_rows === 1) {
    // User authentication successful
    $_SESSION['username'] = $username;
    setcookie("username", $username, time() + 60 * 60 * 24 * 365, "/");
    setcookie("password", $password, time() + 60 * 60 * 24 * 365, "/");
    $response['success'] = true;
  } else {
    $response['success'] = false;
    $response['message'] = "Invalid username or password";
  }

// Send the JSON response
echo json_encode($response);
?>
