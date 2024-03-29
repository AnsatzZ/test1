

<?php
// login_ajax.php
require 'database.php';


header("Content-Type: application/json"); // Since we are sending a JSON response here (not an HTML document), set the MIME Type to application/json

//Because you are posting the data via fetch(), php has to retrieve it elsewhere.
$json_str = file_get_contents('php://input');
//This will store the data into an associative array
$json_obj = json_decode($json_str, true);

//Variables can be accessed as such:




$username = htmlentities($json_obj['username']);

$password =htmlentities($json_obj['password']);


if (preg_match('/^[a-zA-Z\d]+$/', $username)) {
  $data = array('username' => $username);
  $json = json_encode($data);
//   echo $json;
} else {
  $word1 ='Invalid username';
  $json =$word1;
}

// $destination_username = $_POST['dest'];
// $amount = $_POST['amount'];

// // Verify token
// if (!hash_equals($_SESSION['token'], $_POST['token'])) {
//     // Return JSON error response
//     echo json_encode(array('error' => 'Request forgery detected'));
//     // Exit script
//     exit();
// }

// // Process request and return JSON success response
// echo json_encode(array('success' => 'Request processed successfully'));

// $mysqli->prepare("SELECT COUNT(username), uid, hashed_password FROM users WHERE username=?");

// $password = $json_obj['password'];
//This is equivalent to what you previously did with $_POST['username'] and $_POST['password']

// Check to see if the username and password are valid.  (You learned how to do this in Module 3.)



$stmt = $mysqli->prepare("SELECT COUNT(username), uid, hashed_password FROM users WHERE username=?");
$user = htmlentities($username);


$stmt->bind_param('s', $user);
$stmt->execute();
$stmt->bind_result($cnt, $user_id, $pwd_hash);
$stmt->fetch();
$stmt->close();



if($cnt == 1 && password_verify($password, $pwd_hash) ){
	session_start();
	$_SESSION['username'] = htmlentities($username);
	$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32)); 
	// CSRF token

	echo json_encode(array(
		"success" => true,
		"token" => $_SESSION['token']
	));
	exit;

}else{
	echo json_encode(array(
		"success" => false,
		"message" => "Incorrect Username or Password"
	));
	exit;
}
?>
