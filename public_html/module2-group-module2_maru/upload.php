<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

// Check if a file was uploaded
if (isset($_FILES['file'])) {
  // Get the file information
  $file = $_FILES['file'];
  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['type'];

  // Get the file extension
  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  // Allow certain file formats
  $allowed = array('jpg', 'jpeg', 'png', 'pdf');
  if (!in_array($fileActualExt, $allowed)) {
    echo "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
    exit;
  }

  // Check for errors
  if ($fileError === 0) {
    // Generate a unique filename for the user
    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
    $fileDestination = 'uploads/' . $fileNameNew;

    // Move the uploaded file to the uploads directory
    move_uploaded_file($fileTmpName, $fileDestination);

    // Save the file information to a database
    $conn = mysqli_connect('localhost', 'root', '', 'file_sharing');
    $username = $_SESSION['username'];
    $sql = "INSERT INTO files (username, file_name, file_path) VALUES ('$username', '$fileName', '$fileDestination')";
    mysqli_query($conn, $sql);

    header("Location: main_directory.php");
    exit;
  } else {
    echo "There was an error uploading your file. Please try again.";
    exit;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Upload File</title>
</head>
<body>
  <h1>Upload a File</h1>
  <form action="upload_file.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit">Upload</button>
  </form>
</body>
</html>
