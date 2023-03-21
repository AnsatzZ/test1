<!doctype html>
<html lang>
<head>
    <title> </title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"/> -->
</head>
<body>





<?php
require 'database.php';

$stmt = $mysqli->prepare("select s1.user, s1.title, s1.url, s1.story, s1.story_id, s2.comment, s2.comment_id from story s1 left JOIN comments s2 on s1.story_id=s2.story_id order by user");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->execute();

$result = $stmt->get_result();
$x=$row["story_id"]=0;
$y=1;
echo "<ul>\n";
while($row = $result->fetch_assoc()){
    

    if($x!=$row["story_id"]){
        if($y!=1){
            echo "". "<br>","<br>". "";
        }
        printf("\t<li>Story_ID: %s </li>\n",
        htmlspecialchars( $row["story_id"] ));

	    printf("\t<li>User: %s </li>\n",
		htmlspecialchars( $row["user"] ));

		printf("\t<li>Title: %s </li>\n",

		htmlspecialchars( $row["title"] ));
		printf("\t<li>webpage: %s </li>\n",
		htmlspecialchars( $row["url"] ));
		printf("\t<li>story details: %s </li>\n",
		htmlspecialchars( $row["story"] ));
        $x=$row["story_id"];
        $y+=1;
        // echo "". "<br>". "";
    }
        printf("\t<li>comment_id: %s </li>\n",
        htmlspecialchars( $row["comment_id"] ));
        
        printf("\t<li>comments: %s </li>\n",
		htmlspecialchars( $row["comment"] ));

        
		
	
}
echo "</ul>\n";

$stmt->close();
?>
<form action="viewDetail.php" method="POST">
    <br><br><br>
    <input type="submit" name="comment" value='comment' /><br>
    <input type="submit" name="delete_comment" value='Delete your comment' /><br><br><br>
    <input type="submit" name="post_story" value='Post New Story' /><br>
    <input type="submit" name="change_story" value='Modify Your Story Here' /><br>
    <input type="submit" name="delete_story" value='Delete Your Story Here' /><br>


    <br>
    <input type="submit" name="backtologin" value="back to login" /><br><br><br>
</form>

<?php
if(isset($_POST['comment'])){
    header("Location: comment.php");
}

if(isset($_POST['delete_story'])){
    header("Location: deleteStory.php");
}

if(isset($_POST['post_story'])){
    header("Location: post.php");
}

if(isset($_POST['change_story'])){
    header("Location: changeStory.php");
}

if(isset($_POST['delete_comment'])){
    header("Location: deleteComment.php");
}

if(isset($_POST['backtologin'])){
    header("Location: login.html");
}
?>
</body>
</html>
