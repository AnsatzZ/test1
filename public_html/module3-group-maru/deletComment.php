<html>


<form action="deleteComment.php" method="POST">
                Username:  <input type="text" name="username"/><br>
                Password:  <input type="password" name="password"/><br> 
                Enter the Comment_ID of your comment:<input type="int" name="comment_id"/><br> 
                
                <input type="submit" name="delete" value="delete"/><br><br><br>
                <br><br><br>
                <input type="submit" name="goback" value="back" /><br><br><br>
            </form>
    

<?php    

require 'database.php';

if(isset($_POST["goback"])){
    header("Location: viewDetail.php");
    }


if(isset($_POST["delete"])){ 
    if(isset($_POST["password"])){
        if(isset($_POST["comment_id"])){
            if(isset($_POST["username"])){
            
                session_start();
                $user=$_POST["username"];
                $password=$_POST["password"];
                $comment_id=$_POST["comment_id"];
                
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




                $stmt2 = $mysqli->prepare("DELETE From comments WHERE comment_id=? AND user_name=?");
                if(!$stmt2){
                    printf("Query Prep Failed: %s\n", $mysqli->error);
                    exit;
                }
                $stmt2->bind_param('ss', $comment_id, $user);
                echo "It will be deleted if it is your work!";
                $stmt2->execute();
                
                $stmt2->close();


                }else{
                    echo "Check your inputs!";
                    exit();
                } 
            }  
        }
    }
}else{
    echo "please fill all the blanks";
}





?>        
</html>