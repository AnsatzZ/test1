<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>News Site</title>
  <style type= "text/css">
    body{
      background: #335BFF;
      text-align: center;
      color: gray;
    }
  </style>
</head>
<?php
// Content of database.php

$mysqli = new mysqli('localhost', 'wustl_inst', 'wustl_pass', 'module3group');

if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}
?>

<body>
  <h1> This is a news web site.</h1>
  <!--Login form-->
  <form action="login.php" method="post">
    <input type= "text" name= "username" placeholder="Enter your username"/>
    

    <input type= "text" name= "password" placeholder="Enter your password"/>
    <input type= "submit" name="login" value= "Log In"/>
    

    
    
  </form>

  <form action="unregister.php" method="post">
    
    <input type= "submit" name="login" value= "View the site without login"/>
    
  </form>

  


</form>
</body>
</html>
