

<?php
// login_ajax.php
require 'database.php';


header("Content-Type: application/json"); // Since we are sending a JSON response here (not an HTML document), set the MIME Type to application/json

//Because you are posting the data via fetch(), php has to retrieve it elsewhere.
$json_str = file_get_contents('php://input');
//This will store the data into an associative array
$json_obj = json_decode($json_str, true);


//Variables can be accessed as such:
$date = $json_obj['date'];
$user = $json_obj['user'];
//This is equivalent to what you previously did with $_POST['username'] and $_POST['password']

// Check to see if the username and password are valid.  (You learned how to do this in Module 3.)



$stmt = $mysqli->prepare("SELECT *  FROM events WHERE user=? and date=?");


$stmt->bind_param('ss', $user,$date);
$stmt->execute();
$stmt -> bind_result($activity1,$description1,$time1,$date1,$eventid1,$user1);

$activity1 = htmlentities($activity1);
$description1 = htmlentities($description1);
$time1 = htmlentities($time1);
$date1 = htmlentities($date1);
$eventid1 = htmlentities($eventid1);
$user1 = htmlentities($user1);

// $stmt->fetch();
$result = $stmt->get_result();
$stmt->close();
// fetch all the rows into an array
$rows = array();
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
$options = JSON_PRETTY_PRINT;

// convert the array to JSON and output it
echo $json = json_encode($rows,$options);

// $data = array(
//     'name' => $activity1,
//     'age' => $description1,
//     'time' => $time1,
//     'date' => $date1,
//     'eventid' => $eventid1,
//     'user' => $user1,
// );


// echo json_encode($data, $options);


	exit;

?>
