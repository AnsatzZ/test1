<!DOCTYPE html>
<html lang='en'>

<head>
  <title> Login Page</title>
</head>
<body>
  

<?php
  session_start();
  ini_set('auto_detect_line_endings', true);
  $user = fopen("/srv/module2/Users.txt", "r");
  echo "<ul>\n";

  while (!feof($user)){
    $username= trim (fgets ($user));
    if ($_POST['username'] === $username && strlen($username) > 0){
      $_SESSION['username'] = $_POST['username'];
      // header("Location: file_sharing.php");
      header("Location: files.php");

      exit;
    }
  }
  echo "</ul>\n";
  fclose($user);
?>
<body>
</html>