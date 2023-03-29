<?php
require 'database.php';



$title = $_POST['title'];


$stmt = $mysqli->prepare("delete from story where title=? ");



if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('s', $title);

$stmt->execute();

$stmt->close();

header("Location: filesTrial.php")

?>