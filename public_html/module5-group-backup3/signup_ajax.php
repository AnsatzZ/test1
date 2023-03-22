<?php
require 'database.php';

header("Content-Type: application/json"); // Since we are sending a JSON response here (not an HTML document), set the MIME Type to application/json

//Because you are posting the data via fetch(), php has to retrieve it elsewhere.
$json_str = file_get_contents('php://input');
//This will store the data into an associative array
$json_obj = json_decode($json_str, true);

//Variables can be accessed as such:
$username = $json_obj['username'];
$password = $json_obj['password'];
if (preg_match('/^[a-zA-Z\d]+$/', $username)) {
	$data = array('username' => $username);
	$json = json_encode($data);
  //   echo $json;
  } else {
	$word1 ='Invalid username';
	$json =$word1;
	exit;
  }

//This is equivalent to what you previously did with $_POST['username'] and $_POST['password']


// Check to see if the username and password are valid.  (You learned how to do this in Module 3.)



$stmt = $mysqli->prepare("SELECT count(username) FROM users WHERE username=?");
$user = $username;

$stmt->bind_param('s', $user);
$stmt->execute();
$stmt->bind_result($cnt);
$cnt = htmlentities($cnt);
$stmt->fetch();

$pwd_hash = password_hash($password,PASSWORD_BCRYPT);
$stmt ->close();




if($cnt != 1 ){
	$stmt2 = $mysqli->prepare("INSERT INTO users (username, hashed_password) values (?,?)");
	$stmt2->bind_param('ss', $user,$pwd_hash);
	$user = htmlentities($user);
	$pwd_hash = htmlentities($pwd_hash);
    $stmt2 ->execute();
    $stmt2 ->close();
	
	echo json_encode(array(
		"success" => true
	));
	exit;
	
}else{
	echo json_encode(array(
		"success" => false,
		"message" => "Username has been taken"
	));
	exit;
}
?>