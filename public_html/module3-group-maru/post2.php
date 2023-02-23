<?php
require 'database.php';

$user = "user";

// $uid =39;
$title = $_POST['title'];
$url = $_POST['url'];
$story = $_POST['story'];

$stmt = $mysqli->prepare("insert into story (user, title, url, story) values (?,?, ?, ?)");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('ssss', $user, $title, $url, $story);
if(!$stmt){
	printf("bind param : %s\n", $mysqli->error);
	exit;
}

$stmt->execute();
if(!$stmt){
	printf("execuate: %s\n", $mysqli->error);
	exit;
}

$stmt->close();
if(!$stmt){
	printf("close Failed: %s\n", $mysqli->error);
	exit;
}

if(isset($_POST["goback"])){
	header("Location: filesTrial.php");
   }
header("Location: filesTrial.php")

?>