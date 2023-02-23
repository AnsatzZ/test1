

<?php
require 'database.php';

$stmt = $mysqli->prepare("select user, title, url, story from story order by user");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->execute();

$result = $stmt->get_result();

echo "<ul>\n";
while($row = $result->fetch_assoc()){
	printf("\t<li>User: %s </li>\n",
		htmlspecialchars( $row["user"] ));

		printf("\t<li>Title: %s </li>\n",

		htmlspecialchars( $row["title"] ));
		printf("\t<li>webpage: %s </li>\n",
		htmlspecialchars( $row["url"] ));
		printf("\t<li>story details: %s </li>\n",
		htmlspecialchars( $row["story"] ));
        

		echo "". "<br>". "";
	;
}
echo "</ul>\n";

$stmt->close();
?>