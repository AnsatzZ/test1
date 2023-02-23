
<?php

require 'database.php';

if(isset($_POST["user"])){ 
    if(isset($_POST["email"])){
        if(isset($_POST["rc"])){
            session_start();
            $user=$_POST["user"];
            $email=$_POST["email"];
            $rc=$_POST["rc"];

            $stmt = $mysqli->prepare("SELECT username,email,rc FROM users WHERE username=?");
            if(!$stmt){
                printf("1Query Prep Failed: %s\n", $mysqli->error);
                exit;
            }
            $stmt->bind_param('s',$user);
            $stmt->execute();
            $stmt -> bind_result($users_check,$email_check,$rc_check);
            $stmt ->fetch();
            $stmt ->close();
            if($users_check==$user && $email_check==$email && $rc_check==$rc){
                $stmt2 = $mysqli->prepare("DELETE From users WHERE username=?");
                if(!$stmt2){
                    printf("Query Prep Failed: %s\n", $mysqli->error);
                    exit;
                }
                $stmt2->bind_param('s', $user);
                echo "Deleted!";
                $stmt2->execute();
                
                $stmt2->close();
                
            exit();
            }else{
                echo "Check your inputs!";  
            }
        } 
     }
}




?>


