<?php
session_start();
require 'database.php';
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>News</title>
        </head>
    
        <body>

            <h1>News site</h1><br>
            <?php


            {
                
                $user=$_SESSION['user_name'];
                // printf("<p>Hello, %s!</p> \n",
                //        htmlentities($user)
                //        );
                ?>
                

               
                <a href="post.php">Post Story</a>
<hr>
</hr>
<a href="viewDetail.php">View all story details</a>

<hr>
</hr>

<a href="edit.php">Edit Story</a>
<hr>
</hr>

<a href="delete.php">Delete Story</a>
<hr>
</hr>
            
                </form><br><br>
        <?php
             }
        ?>
        <h1>LATEST STORIES</h1>
        
            
<?php
//END DETERMINING IF USER IS LOGGED IN
//DISPLAY STORIES
		//preprare statement to delect author, timestamp, title, and id of the story from the appropriate tables
        $stmt = $mysqli->prepare("SELECT story.user, story.title, story.url, story_id
                                 FROM story
                                --  JOIN users
                                --     ON (story.authorid=users.userid)
                                --  ORDER BY posted DESC
                                ");
		
		//make sure that the prepare is successful
        if(!$stmt)
        {
        	printf("Query Prep Failed: %s\n", $mysqli->error);
        	exit;
        }
		
		//execute and bind results
        $stmt->execute();
        $stmt->bind_result($auth, $timestamp, $title, $story_id);

		//print out every story with title, author, and timestamp
        while($stmt->fetch())
        {
			//Also escape all the outputs
            ?>
            <h2><?php printf("%s", htmlentities($title));?></h2>
            <i>Posted by:  <?php printf("%s", htmlentities($auth));?></i><br>
            <?php printf("%s", htmlentities($timestamp)); ?><br>
				<!--Give the user an optiont to go to a detailed view to see the story description and comments-->
                <form action = "detailPage.php" method = "GET">
                    <input type="hidden" name="storyid" value= "<?php echo $story_id; ?>"/>
                    <input type="submit" value="Comments">
                </form><br><br>
            <?php
        }
            ?>
            <form name ='input' action="logout.php" method="get">
	
	
	<input type="submit" name="dl" value="logout"  placeholder="Enter your username"/>
        </body>
</html>