<?php
require 'database.php';

header("Content-Type: application/json"); // Since we are sending a JSON response here (not an HTML document), set the MIME Type to application/json

//Because you are posting the data via fetch(), php has to retrieve it elsewhere.
$json_str = file_get_contents('php://input');
//This will store the data into an associative array
$json_obj = json_decode($json_str, true);

$descriptions =  htmlentities($json_obj['descriptions']);
$title = htmlentities($json_obj['title']);
$date = htmlentities($json_obj['date']);
$user = htmlentities($json_obj['user']);
$time = htmlentities($json_obj['time']);


	$stmt = $mysqli->prepare("INSERT INTO events (activity, description,date,time,user) values (?,?,?,?,?)");
	$stmt->bind_param('ssss', $descriptions,$title,$date,$time,$user);
    $activity = htmlentities($title);
    $description = htmlentities($descriptions);
    $date = htmlentities($date);
    $time = htmlentities($time);
    $user = htmlentities($user);


    $stmt ->execute();
    $stmt ->close();
    
	if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }else{
        echo json_encode(array(
            "success" => true
            
        ));
    }
	
	exit;
	

?>