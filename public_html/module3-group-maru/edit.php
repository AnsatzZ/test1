
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post News</title>
    <link rel="stylesheet" type="text/css" href="style/post.css">
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
    <table>
        <tbody>
            <tr>
                <td>
                    <a href="files.php">
                       
                </td>
                <td>
                    <span>
                        <a href="files.php">Main Page</a>
                        |
                        <a href="">Zining</a>
                                |
                                <a href="logout.php">Logout</a>                   </span>
                </td>
            </tr>
        </tbody>
    </table>
    <html>
        <head>
            <title>Edit Your Story</title>
        </head>
        <body>
            <h1>Edit Your Story</h1>
            <form action="edit2.php" method="post">
                <label for="old_title">Old_Title:</label>
                <input type="text" name="old_title" id="old_title" required><br><br>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required><br><br>
                <label for="title">URL:</label>
                <input type="text" name="url" id="url" required><br><br>
                <label for="story">story:</label>
                <textarea name="story" id="story" rows="10" cols="50" required></textarea><br><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </body>

        
    </html>




</body>
</html>