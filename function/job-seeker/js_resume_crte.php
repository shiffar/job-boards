<?php
session_start();
include '../../connection.php';

// Check if the user is logged in (you may need to implement a proper user authentication mechanism)
if (!isset($_SESSION['js_id'])) {
  echo "User not logged in";
  exit;
}

// Process the uploaded file
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Handle file upload
  $uploadDir = 'uploads/cv/'; // Set the directory where CVs will be stored
  $fileName = $_FILES['image']['name'];
  $tmpFilePath = $_FILES['image']['tmp_name'];

  // Check if the user_id already exists in the table
  $userId = $_SESSION['js_id'];
  $checkSql = "SELECT * FROM cvs WHERE user_id = '$userId'";
  $result = $conn->query($checkSql);

  if ($result->num_rows > 0) {
    // User_id already exists, update the existing record
    $row = $result->fetch_assoc();
    $cvFilename = $row['cv_filename'];
    $description = $_POST['description'];
    $skills = json_encode($_POST['skills']);

    // If a new file is uploaded, update the filename, otherwise keep the old filename
    if (!empty($fileName)) {
      // Generate a unique filename (you can use other techniques to ensure uniqueness)
      $uniqueFileName = uniqid() . "_" . $fileName;
      
      // Move the uploaded file to the specified directory
      if (move_uploaded_file($tmpFilePath, $uploadDir . $uniqueFileName)) {
        // Delete the old file (if it exists) but don't unlink if the new file is empty
        if (!empty($cvFilename)) {
          unlink($uploadDir . $cvFilename);
        }
        $cvFilename = $uniqueFileName;
      } else {
        echo "Error: File upload failed";
        exit;
      }
    }

    // Update the existing record in the database
    $updateSql = "UPDATE cvs SET cv_filename = '$cvFilename', description = '$description', skills = '$skills', udte_dte = NOW() WHERE user_id = '$userId'";
    if ($conn->query($updateSql) === TRUE) {
      echo "File uploaded data updated successfully";
    } else {
      echo "Error: " . $updateSql . "<br>" . $conn->error;
    }
  } else {
    // User_id doesn't exist, insert a new record
    // Generate a unique filename (you can use other techniques to ensure uniqueness)
    $uniqueFileName = uniqid() . "_" . $fileName;

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($tmpFilePath, $uploadDir . $uniqueFileName)) {
      $description = $_POST['description'];
      $skills = json_encode($_POST['skills']);

      // Insert data into the database
      $insertSql = "INSERT INTO cvs (user_id, cv_filename, description, skills, crte_date) VALUES ('$userId', '$uniqueFileName', '$description', '$skills', NOW())";
      
      if ($conn->query($insertSql) === TRUE) {
        echo "File uploaded data insert successfully";
      } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
      }
    } else {
      echo "Error: File upload failed";
    }
  }

  // Close the database connection
  $conn->close();
} else {
  echo "Invalid request method";
}
?>
