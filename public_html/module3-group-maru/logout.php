<?php
  session_start();
  $_SESSION = array();
  session_destroy();
echo "Logout Successfully";
  header("Location: login.php");



?>
