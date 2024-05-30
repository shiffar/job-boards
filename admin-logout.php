<?php
session_start();
// Clear the session data
session_unset();
session_destroy();

// Clear the login cookies
setcookie("username", "", time() - 60 * 60 * 24 * 365, "/"); // Expire the username cookie
setcookie("password", "", time() - 60 * 60 * 24 * 365, "/"); // Expire the password cookie
header('Location: admin-login.php');



exit();
?>
