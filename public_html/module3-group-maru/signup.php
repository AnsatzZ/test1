<!doctype html>
<html lang>
<head>
    <title> </title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"/> -->
</head>
<body>
<form action="login.php" method="POST">
    Go Back To Login
    <input type="submit" name="goback" value="back" /><br><br><br>
    
</form>



<?php

require 'database.php';

if(isset($_POST["newUser"])){ 
    if(isset($_POST["password"])){
        if(isset($_POST["email"])){
            session_start();
            $newUser=$_POST["newUser"];
            $password=$_POST["password"];
            $email=$_POST["email"];
            $rp=$_POST["rp"];
            $hash_password=password_hash($password,PASSWORD_BCRYPT); 
            $rc=password_hash($rp,PASSWORD_BCRYPT);  
            // Use a prepared statement

            $stmt = $mysqli->prepare("SELECT username FROM users WHERE username=?");
            if(!$stmt){
                printf("Query Prep Failed: %s\n", $mysqli->error);
                exit;
            }

            $stmt->bind_param('s',$newUser);
            $stmt->execute();
            $stmt -> bind_result($users);
            $stmt ->fetch();
 
            if($newUser==$users){
            echo "Username taken";
            $stmt->close();
            exit();
            }else{
                $stmt = $mysqli->prepare("insert into users (username, hashed_password, email, rc) values (?, ?, ?, ?)");
                if(!$stmt){
                    printf("Query Prep Failed: %s\n", $mysqli->error);
                    exit;
                }
                $stmt->bind_param('ssss', $newUser, $hash_password, $email, $rc);
                $stmt->execute();
                $stmt->close();
                echo "Take notes on your recovery code: $rc";
            }
        } 
     }
}

if(isset($_POST["goback"])){
 header("Location: login.php");
}

?>


</body>
</html>