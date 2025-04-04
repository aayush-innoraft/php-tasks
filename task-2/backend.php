<?php
$fullname = "";
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Handling name input
  if (isset($_POST["first-name"]) && isset($_POST["last-name"])) {
    $firstName = trim($_POST["first-name"]);
    $lastName = trim($_POST["last-name"]);
    if (strlen($firstName) <= 15 && strlen($lastName) <= 15) {
      $fullname = htmlspecialchars($firstName . " " . $lastName);
    } else {
      $error .= "First name and last name must be less than 15 characters.<br>";
    }
  }

  // File upload handling
  if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["size"] > 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
      $error .= "File is not an image.<br>";
      $uploadOk = 0;
    }

    if (file_exists($target_file)) {
      $error .= "Sorry, file already exists.<br>";
      $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 800000) {
      $error .= "Sorry, your file is too large.<br>";
      $uploadOk = 0;
    }

    if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
      $error .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
      $uploadOk = 0;
    }
    
    if ($uploadOk == 1) {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $success = "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
      } else {
        $error .= "Sorry, there was an error uploading your file.<br>";
      }
    }
  } else {
    $error .= "Please select a file to upload.<br>";
  }
}
?>