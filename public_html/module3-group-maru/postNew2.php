<?php    

require 'database.php';

if(isset($_POST["goback"])){
    header("Location: viewDetail.php");
    }


if(isset($_POST["submit"])){ 
    if(isset($_POST["password"])){
        if(isset($_POST["story"])){
            if(isset($_POST["username"])&&isset($_POST["title"])){
                session_start();
                $user=$_POST["username"];
                $password=$_POST["password"];
                $story=$_POST["story"];
                $tile=$_POST["title"];
                $url=$_POST["url"];

                $stmt = $mysqli->prepare("SELECT COUNT(username), hashed_password FROM users WHERE username=?");
                
                // Bind the parameter
                $stmt->bind_param('s', $user);
                $stmt->execute();

                // Bind the results
                $stmt->bind_result($cnt, $pwd_hash);
                $stmt->fetch();
                
                $pwd_guess = $_POST['password'];
                // Compare the submitted password to the actual password hash
                if($cnt == 1 && password_verify($pwd_guess, $pwd_hash)){
                // Login succeeded!
                // Redirect to your target page
                $stmt ->close();

                



                $stmt2 = $mysqli->prepare("INSERT into story (user,title, url,story) values (?, ?, ?,?)");
                if(!$stmt2){
                    printf("Query Prep Failed: %s\n", $mysqli->error);
                    exit;
                }
                $stmt2->bind_param('ssss', $user, $tile, $url,$story);
                $stmt2->execute();
                $stmt2->close();
                echo "Successful!!!";
                header("refresh:1; url=filesTrial.php");

                } else{
                // Login failed; redirect back to the login screen
                echo "Check your password";
                exit();
                }

            }
        }
        
    }
}else{
    echo "please fill all the blanks, if no URL enter NO please";
}




?>        
