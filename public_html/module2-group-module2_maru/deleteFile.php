
<!DOCTYPE html>

<HTML>



<head><title>DeleteFile</title></head>



<?php

// Get the filename and make sure it is valid

session_start();



$input_file = $_GET['filename'];



$username = $_SESSION['username'];
$full_path = sprintf("/srv/module2/%s/%s", $username, $input_file);

echo "<br>";



if (!unlink($full_path)) {



echo ("cannot be deleted due to an error");



}


else {



echo ("$full_path has been deleted");

}



?>




</html>