<html>
<?php
require 'database.php';

$story_id = $_GET['storyid'];

$stmt = $mysqli->prepare("select title, user, story,story_id from story where story_id=?");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('s', $story_id);

$stmt->execute();

// $stmt->bind_result($title, $user,$story);

$result = $stmt->get_result();

echo "<ul>\n";
while($row = $result->fetch_assoc()){
	printf("\t<li>Title: %s </li>\n",
		htmlspecialchars( $row["title"] ));

		printf("\t<li> %s </li>\n",

		htmlspecialchars( $row["User"] ));
		printf("\t<li>story: %s </li>\n",
		htmlspecialchars( $row["story"] ));
		// printf("\t<li>story details: %s </li>\n",
		// htmlspecialchars( $row["story"] ));
        

		echo "". "<br>". "";
	;
}


// echo "<ul>\n";
// while($row = $result->fetch_assoc()){
// 	printf("\t<li>%s %s %s</li>\n",
// 		htmlspecialchars( $row["title"] ),
// 		htmlspecialchars( $row["user"] ),
//         htmlspecialchars( $row["story"] )

// 	);
// }
// echo "</ul>\n";



// echo "<ul>\n";
// while($stmt->fetch()){
//     echo $stmt->fetch()htmlspecialchars($title),;
// 	printf("\t<li>%s %s %s</li>\n",
// 		htmlspecialchars($title),
// 		htmlspecialchars($user),
//         htmlspecialchars($story),
// 	);
// }
// echo "</ul>\n";

$stmt->close();

?>

<form action="comment.php" method="POST">
                <textarea rows="10" name="comment" placeholder="enter your comment here" ></textarea>
                <br>
                <button type="submit">Post</button>
            </form>
    
</form>
</html>