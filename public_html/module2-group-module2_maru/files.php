<html lang ="en">
<head>
  <title>We really need an UI designer</title>
</head>
<body>
  <h1>File List</h1>
  <form enctype="multipart/form-data" action="uploader.php" method="POST">
	<p>
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		<label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
	</p>
	<p>
		<input type="submit" value="Upload File" />
	</p>

</form>



<form name ='input' action="checkFile2.php" method="get">
	File name :<input name ="filename" value ="">
	
	<input type="submit" name="CF" value="view"  placeholder="Enter your username"/>
		
		
</form>

<form name ='input' action="checkFile.php" method="get">
	File name :<input name ="filename" value ="">
	
	<input type="submit" name="CF2" value="download"  placeholder="Enter your username"/>
		
		
</form>

<form name ='input' action="deleteFile.php" method="get">
	File name :<input name ="filename" value ="">
	
	<input type="submit" name="dl" value="delete"  placeholder="Enter your username"/>
		
		
</form>

<!-- <form name ='input' action="deleteAllFile.php" method="get">
	File name :<input name ="filename" value ="">
	
	<input type="submit" name="dl" value="deleteAll"  placeholder="Enter your username"/>
		
		
</form> -->


<form name ='input' action="shareFile.php" method="get">
	File name :<input name ="filename" placeholder="Enter the file name"value ="">
	<input name ="target" placeholder="Enter target username"value ="">
	<input type="submit" name="dl" value="share"  />
	
		
</form>
<form name ='input' action="logout.php" method="get">
	
	
	<input type="submit" name="dl" value="logout"  placeholder="Enter your username"/>
		
		
</form>
 
</body>
</html>
