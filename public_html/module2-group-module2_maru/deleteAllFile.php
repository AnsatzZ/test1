
<!DOCTYPE html>

<HTML>



<head><title>Eraser</title></head>



<?php



session_start();




$username = $_SESSION['username'];
$full_path = sprintf("/srv/module2/%s", $username);

echo "<br>";



if (!unlink($full_path)) {

echo ("unsuccessful");


}


else {

echo ("successful deletion");

}


?>



</html>