<!doctype html>
<html lang>
<head>
    <title> News Site</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"/> -->
</head>
<body>
<form action="login2.php" method="POST">
    Username:<input type="text" name="username"/><br>
    password:<input type="password" name="password"/><br>
    Signin<input type="submit" value="login" /><br><br><br>
    
</form>




<form name ='input' action="signupTemp.php" method="get">
	
	
	<input type="submit" name="signup" value="signup_here"  placeholder="Enter your username"/>
		
		
</form>



<form name ='input' action="deleteUser.html" method="get">
	
	
	<input type="submit" name="signup" value="deleteUser"  placeholder="Enter your username"/>
		
		
</form>


<form action="forget.php" method="post">
    
    <input type= "submit" name="login" value= "forget password?"/>
    
  </form>


<form action="unregister.php" method="post">
    
    <input type= "submit" name="login" value= "View the site without login"/>
    
  </form>


  <form action="loginAdmin.php" method="post">
    
    <input type= "submit" name="login" value= "Admin user login"/>
    
  </form>






</body>
</html>

