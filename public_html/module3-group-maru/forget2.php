<!doctype html>
<html lang>
<head>
    <title> </title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"/> -->
</head>
<body>
<form action="forget2.php" method="POST">
    Username:<input type="text" name="user"/><br>
    email:<input type="text" name="email"/><br>
    Recovery Code:<input type="password" name="rc"/><br>
    New Password: <input type="password" name="newp"/><br>
    Recover <input type="submit" name="recover" value="Yes!" />
    <br><br><br><br><br><br>
    Go Back To Login
    <input type="submit" name="goback" value="back" /><br><br><br>

</form>



<?php

require 'database.php';

if(isset($_POST["goback"])){
    header("Location: loginAdmin.php");
   }



if(isset($_POST["user"])){ 
    if(isset($_POST["email"])){
        if(isset($_POST["rc"])){
            if(isset($_POST["newp"])){
            session_start();
            $user=$_POST["user"];
            $email=$_POST["email"];
            $rc=$_POST["rc"];
            $np=$_POST["newp"];
            $hash_np=password_hash($np,PASSWORD_BCRYPT); 



            $stmt = $mysqli->prepare("SELECT username,email,rc FROM users2 WHERE username=?");
            if(!$stmt){
                printf("Query Prep Failed: %s\n", $mysqli->error);
                exit;
            }

            $stmt->bind_param('s',$user);
            $stmt->execute();
            $stmt -> bind_result($user_check,$email_check,$rc_check);
            $stmt ->fetch();
            $stmt->close();


            if($user_check!=$user || $email!=$email_check||$rc!=$rc_check){
            echo "Check your input";
            exit();
            }else{
                
                echo "Request recieved   You can go back try your new password";
                $forget_user = "forget";
                $stmt2 = $mysqli->prepare("UPDATE users2 SET hashed_password=? WHERE username=?");
                if(!$stmt2){
                    printf("Query Prep Failed: %s\n", $mysqli->error);
                    exit;
                }

                $stmt2->bind_param('ss', $hash_np,$user);
                $stmt2->execute();

                $stmt2->close();

                }
            }
        } 
     }
}


?>


</body>
</html>