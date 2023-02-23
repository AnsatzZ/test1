<!DOCTYPE html>

<HTML>

<head><title>shareFile</title></head>

<?php

// Get the filename and make sure it is valid

session_start();

$input_file = $_GET['filename'];

$username = $_SESSION['username']; 
$target = $_GET['target'];

$full_path = sprintf("/srv/module2/%s/%s", $username, $input_file);

$targetpath = sprintf("/srv/module2/%s/%s", $target, $input_file);

echo "<br>";

if (file_exists($full_path)){ copy($full_path, $targetpath); echo "File shared";


}

else {



echo "File sharing failed";

}


?>



</html>