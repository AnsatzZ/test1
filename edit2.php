<?php
require 'database.php';

$user = "Zining";
$old_title = $_POST['old_title'];
$title = $_POST['title'];
$url = $_POST['url'];
$story = $_POST['story'];

$stmt = $mysqli->prepare("update story set user=?,title=?, url=?, story=? where title=? ");



if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('sssss', $user, $title, $url, $story,$old_title);

$stmt->execute();

$stmt->close();

header("Location: filesTrial.php")

?>