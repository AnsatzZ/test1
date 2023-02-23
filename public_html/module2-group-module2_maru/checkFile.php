<!DOCTYPE html>
<html lang='en'>


<head><title>checkFile</title> </head>
<?php
session_start();

$input_file = $_GET['filename'];
echo $input_file;

$username= $_SESSION['username'];

$full_path = sprintf("/srv/module2/%s/%s", $username, $input_file);

$finfo= new finfo(FILEINFO_MIME_TYPE);

$mime = $finfo->file($full_path); 

header("Content-Disposition: attachment; filename=".basename($full_path));

header("Content-Type: ".$mime);

readfile($full_path);

?>



</html>