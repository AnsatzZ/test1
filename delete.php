
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete News</title>

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
                        
                                |
                                <a href="logout.php">Logout</a>                   </span>
                </td>
            </tr>
        </tbody>
    </table>
    <html>
        <head>
            <title>Delete Your Story</title>
        </head>
        <body>
            <h1>Delete Your Story</h1>
            <form action="delete2.php" method="post">
               
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required><br><br>
               
                <input type="submit" name="submit" value="Submit">
            </form>
        </body>

        
    </html>




</body>
</html>