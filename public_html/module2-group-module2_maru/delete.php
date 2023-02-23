<?php
  session_start();
  if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $file = $_GET['filename'];
    unlink("$username/$file");
    header("Location: mainDirectory.php");
  } else {
    header("Location: login.php");
  }
?>
