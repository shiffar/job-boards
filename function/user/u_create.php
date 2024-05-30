<?php
include '../../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registrationType = $_POST['registrationType'];
    $firstName = $_POST['f_nm'];
    $lastName = $_POST['l_nm'];
    $userName = $_POST['u_nm'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telephone = $_POST['tele'];

    $usernameExists = false;

    $checkJobSeekerQuery = "SELECT COUNT(*) as count FROM job_seeker WHERE u_nm = '$userName'";
    $resultJobSeeker = $conn->query($checkJobSeekerQuery);

    if ($resultJobSeeker === FALSE) {
        echo "Error checking username availability in job_seeker table";
    } else {
        $rowJobSeeker = $resultJobSeeker->fetch_assoc();
        if ($rowJobSeeker['count'] > 0) {
            $usernameExists = true;
        }
    }

    $checkJobProviderQuery = "SELECT COUNT(*) as count FROM job_provider WHERE u_nm = '$userName'";
    $resultJobProvider = $conn->query($checkJobProviderQuery);

    if ($resultJobProvider === FALSE) {
        echo "Error checking username availability in job_provider table";
    } else {
        $rowJobProvider = $resultJobProvider->fetch_assoc();
        if ($rowJobProvider['count'] > 0) {
            $usernameExists = true;
        }
    }

    if ($usernameExists) {
        echo "Username already exists";
    } else {
        if ($registrationType === 'candidate') {
            $table = 'job_seeker';
        } elseif ($registrationType === 'employer') {
            $table = 'job_provider';
        } else {
            echo "Invalid registration type";
            exit; // Exit the script
        }

        // Check if the email already exists
        $checkEmailQuery = "SELECT COUNT(*) as count FROM $table WHERE gmail = '$email'";
        $resultEmail = $conn->query($checkEmailQuery);
        if ($resultEmail === FALSE) {
            echo "Error checking email availability";
        } else {
            $rowEmail = $resultEmail->fetch_assoc();
            if ($rowEmail['count'] > 0) {
                echo "Email already exists";
            } else {
                $insertQuery = "INSERT INTO $table (f_nm, l_nm, u_nm, pswrd, gmail, tel, c_dte) VALUES ('$firstName', '$lastName', '$userName', '$password', '$email', '$telephone', NOW())";

                if ($conn->query($insertQuery) === TRUE) {
                    echo "Registration successful";
                } else {
                    echo "Error inserting data";
                }
            }
        }
    }
}
?>
