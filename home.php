<?php

session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
Welcome 
<form action="read.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<textarea placeholder="Enter Mail"></textarea>
		<label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" class="form-control" id="exampleInputFile">
		
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>