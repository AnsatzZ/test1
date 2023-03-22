

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
//This is equivalent to what you previously did with $_POST['username'] and $_POST['password']

// Check to see if the username and password are valid.  (You learned how to do this in Module 3.)



$stmt = $mysqli->prepare("SELECT *  FROM events");
$user = $username;

// $stmt->bind_param('s', $user);
$stmt->execute();
$stmt -> bind_result($activity1,$description1,$time1,$date1,$eventid1,$user1);
$stmt->fetch();
$result = $stmt->get_result();





	echo json_encode(array(
		$result
	));
    $stmt->close();
	exit;

?>
