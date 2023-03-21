<html>


<form action="changeStory.php" method="POST">
                Username:  <input type="text" name="username"/><br>
                Password:  <input type="password" name="password"/><br> 
                Enter the Story_ID of your Story that you want to modify:<input type="int" name="story_id"/><br> 
                <textarea rows="16" name="modified_story" placeholder="enter your modified story here" ></textarea>
                <br>
                <input type="submit" name="modify" value="modify"/><br><br><br>
                <br><br><br>
                <input type="submit" name="goback" value="back" /><br><br><br>
            </form>
    

<?php    

require 'database.php';

if(isset($_POST["goback"])){
    header("Location: viewDetail.php");
    }


if(isset($_POST["modify"])){ 
    if(isset($_POST["password"])){
        if(isset($_POST["story_id"])){
            if(isset($_POST["username"])){
            
                session_start();
                $user=$_POST["username"];
                $password=$_POST["password"];
                $story_id=$_POST["story_id"];
               
                $stmt = $mysqli->prepare("SELECT COUNT(username), hashed_password,story_id FROM users u join story s on u.username=s.user WHERE username=?");
                
                // Bind the parameter
                $stmt->bind_param('s', $user);
                $stmt->execute();

                // Bind the results
                $stmt->bind_result($cnt, $pwd_hash,$id_check);
                $stmt->fetch();
                
                $pwd_guess = $_POST['password'];
                // Compare the submitted password to the actual password hash
                if($cnt == 1 && password_verify($pwd_guess, $pwd_hash) && $story_id==$id_check){
                // Login succeeded!
                // Redirect to your target page
                $stmt ->close();



                $modified_story=$_POST["modified_story"];
                $stmt2 = $mysqli->prepare("UPDATE story SET story=? WHERE story_id=?");
                if(!$stmt2){
                    printf("Query Prep Failed: %s\n", $mysqli->error);
                    exit;
                }
                $stmt2->bind_param('ss', $modified_story, $story_id);
                echo "It will be updated!";
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