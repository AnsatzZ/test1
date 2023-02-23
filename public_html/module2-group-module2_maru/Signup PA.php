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


if(userCheck('/srv/module2/',$newUser)){
    echo "Go back and choose another name";
}else{
    mkdir('/srv/module2/',$newUser);
//    Make new directory
    $file=fopen($filepath,"w");
    fwrite($file,$newUser);
//    Add new user to user.txt
    fclose($file);
}



function userCheck($filepath,$username){
//    To check users with same names
    $read=fopen("filepath","r");
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

