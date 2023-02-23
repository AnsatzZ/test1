<!doctype html>
<html lang>
<head>
    <title> </title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"/> -->
</head>
<body>


<?php
$newUser=$_GET("newUser");
//    Studied this part on w3schools.com
//    https://www.w3schools.com/php/php_file_create.asp

$filepath = sprintf("/srv/module2/%s", $newUser);
if(userCheck('/srv/module2/Users.txt',$newUser)){
    echo "Go back and choose another name";
    header("Location: mainDirectory.php");
    exit;
}else{
    mkdir('/srv/module2/%s',$newUser);
//    Make new directory
    $file=fopen('/srv/module2/Users.txt',"w");
    fwrite($file,$newUser);
//    Add new user to user.txt
    fclose($file);
    header("Location: mainDirectory.php");
    
}



function userCheck($filepath,$username){
//    To check users with same names
    $read=fopen($filepath,"r");
    echo "weqfd";
    while(!feof($read)) {
        if ($username == trim(fgets($read))) {
            return TRUE;
        }
    }
        return FALSE;

}

?>
</body>
</html>

