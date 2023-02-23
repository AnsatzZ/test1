<?php

require 'database.php';

// Use a prepared statement
$stmt = $mysqli->prepare("SELECT COUNT(*),  hashed_password FROM users WHERE username=?");

// Bind the parameter
$user = $_POST['username'];

$stmt->bind_param('s', $user);
$stmt->execute();

// Bind the results
$stmt->bind_result($cnt,  $pwd_hash);
$stmt->fetch();

$pwd_guess = $_POST['password'];
// echo $pwd_guess;
// Compare the submitted password to the actual password hash
if($cnt == 1 && password_verify($pwd_guess, $pwd_hash)){
	// Login succeeded!
	// $_SESSION['user_id'] = $user_id;
    header("Location: filesTrial.php");

	// Redirect to your target page
    // 转到目标网站
} else{
	// Login failed; redirect back to the login screen
    echo "Check your password";
    exit();
}

$signup = $_POST['signup'];
if(isset($signup)){
header("Location: signup.php");
exit();
}



$forget = $_POST['forget'];
if(isset($forget)){
header("Location: forget.php");
exit();
}




?>