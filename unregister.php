<html lang ="en">
<head>
  <title>We really need an UI designer</title>
</head>
<body>
  <h1>News now</h1>
 

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
		// printf("\t<li>story details: %s </li>\n",
		// htmlspecialchars( $row["story"] ));
        

		echo "". "<br>". "";
	;
}
echo "</ul>\n";

$stmt->close();
?>


<a href="viewDetail.php">View all story details</a>

<hr>
</hr>





<form name ='input' action="logout.php" method="get">
	
	
	<input type="submit" name="dl" value="logout"  placeholder="Enter your username"/>
		
		
</form>
</body>
</html>