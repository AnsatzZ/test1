<html>


<form action="comment.php" method="POST">
                Username:  <input type="text" name="username"/><br>
                Password:  <input type="password" name="password"/><br> 
                Story_ID You Want to Comment:<input type="text" name="story_id"/><br> 
                <textarea rows="10" name="comment" placeholder="enter your comment here" ></textarea>
                <br>
                <button type="submit">Post</button>
                <br><br><br><br><br>
                <input type="submit" name="goback" value="back" /><br><br><br>
            </form>
    

<?php    

require 'database.php';

if(isset($_POST["goback"])){
    header("Location: viewDetail.php");
    }


if(isset($_POST["username"])){ 
    if(isset($_POST["password"])){
        if(isset($_POST["story_id"])){
            if(isset($_POST["comment"])){
                session_start();
                $user=$_POST["username"];
                $password=$_POST["password"];
                $story_id=$_POST["story_id"];
                $comment=$_POST["comment"];
                
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

                



                $stmt2 = $mysqli->prepare("insert into comments (story_id, comment, user_name) values (?, ?, ?)");
                if(!$stmt2){
                    printf("Query Prep Failed: %s\n", $mysqli->error);
                    exit;
                }
                $stmt2->bind_param('sss', $story_id, $comment, $user);
                $stmt2->execute();
                $stmt2->close();
                echo "Successful!!!";

                } else{
                // Login failed; redirect back to the login screen
                echo "Check your password";
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