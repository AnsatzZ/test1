<!doctype html>
<html lang>
<head>
    <title> </title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"/> -->
</head>
<body>
<form action="login.php" method="POST">
    Username:<input type="text" name="newUser"/><br>
    password:<input type="password" name="password"/><br>
    Signin<input type="submit" value="login" /><br><br><br>
    New USER????<input type="submit" name="signup" value="Yes!" /><br>
    Foget your Password?? <input type="submit" name="forget" value="Yes!" />
</form>

<?php

require 'database.php';

// Use a prepared statement
$stmt = $mysqli->prepare("SELECT COUNT(*), id, hashed_password FROM users WHERE username=?");

// Bind the parameter
$user = $_POST['username'];

$stmt->bind_param('s', $user);
$stmt->execute();

// Bind the results
$stmt->bind_result($cnt, $user_id, $pwd_hash);
$stmt->fetch();

$pwd_guess = $_POST['password'];
// Compare the submitted password to the actual password hash
if($cnt == 1 && password_verify($pwd_guess, $pwd_hash)){
	// Login succeeded!
	$_SESSION['user_id'] = $user_id;
	// Redirect to your target page
    // 转到目标网站
} else{
	// Login failed; redirect back to the login screen
    echo "Check your password";
    exit();
}

$signup = $_POST['signup'];
if(isset($signup)){
header("Location: signup.html");
exit();
}

$forget = $_POST['forget'];
if(isset($forget)){
header("Location: forget.php");
exit();
}


?>
</body>
</html>

