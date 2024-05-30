<?php
include'../../connection.php';

// Retrieve data from the form
$f_nm = $_POST["f_nm"];
$l_nm = $_POST["l_nm"];
$u_nm = $_POST["u_nm"];
$password = $_POST["password"];
$email = $_POST["email"];
$tele = $_POST["tele"];

// Insert the data into the database
$sql = "INSERT INTO admin (f_nm, l_nm, u_nm, pswrd, gmail, tel, c_dte)
        VALUES ('$f_nm', '$l_nm', '$u_nm', '$password', '$email', '$tele', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "success"; // Return "success" upon successful registration
} else {
    echo "Error";
}

// Close the database connection
$conn->close();
?>
