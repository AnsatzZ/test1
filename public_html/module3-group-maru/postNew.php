<!DOCTYPE html>
<html lang="en">
<head>
    <title>Post News</title>
</head>

<?php
// Content of database.php

require 'database.php';


?>

<body>
    <table>
        <tbody>
            <tr>
                <td>
                    <a href="files.php">
                       
                </td>
              
            </tr>
        </tbody>
    </table>
    <html>
        <head>  
            <title>Upload Your Story</title>
        </head>
        <body>
            <h1>Upload Your Story</h1>
            
            <form action="postNew2.php" method="post">

                Username:  <input type="text" name="username"/><br>
                Password:  <input type="password" name="password"/><br> <br>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required><br><br>
                <label for="title">URL:</label>
                <input type="text" name="url" id="url" ><br><br>
                <label for="story">story:</label>
                <textarea name="story" id="story" rows="10" cols="50" required></textarea><br><br>
                <input type="submit" name="submit" value="Submit">
                <br><br><br><br><br><br>
                


            </form>




            <form action="post.php" method="post">
              
                <input type="submit" name="goback" value="back" /><br><br><br>


            </form>



<?php
         
if(isset($_POST["goback"])){
header("Location: viewDetail.php");
}
?>
        </body>

        
    </html>

 

</body>
</html>