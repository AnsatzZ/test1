

<?php
// login_ajax.php
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



$stmt = $mysqli->prepare("SELECT COUNT(username), userid, hashed_password FROM users WHERE username=?");
$user = $username;

$stmt->bind_param('s', $user);
$stmt->execute();
$stmt->bind_result($cnt, $userid, $pwd_hash);
$cnt = htmlentities($cnt);
$userid = htmlentities($userid);
$pwd_hash = htmlentities($pwd_hash);
$stmt->fetch();
$stmt->close();


if($cnt == 1 && password_verify($password, $pwd_hash) ){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['uid'] = $uid;
	$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32)); 

	echo json_encode(array(
		"success" => true,
		"token" => $_SESSION['token'],

		"username1"=> $_SESSION['username'] 
		
	));
	exit;
}else{
	echo json_encode(array(
		"success" => false,
		"message" => "Incorrect Username or Password"
	));
	exit;
}

// if($cnt == 1 && password_verify($password, $pwd_hash) ){
// 	session_start();
// 	$_SESSION['username'] = $username;
// 	$_SESSION['uid'] = $userid;
// 	$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32)); 

// 	echo json_encode(array(
// 		"success" => true
// 	));
// 	exit;
// }else{
// 	echo json_encode(array(
// 		"success" => false,
// 		"message" => "Incorrect Username or Password"
// 	));
// 	exit;
// }
?>
