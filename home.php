<?php

session_start();
include('config.php');

?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

     <style type="text/css">
          *{
               box-sizing: border-box;
          }
          body
          {
               box-sizing: border-box;
               margin: 0;
               padding: 0;
               background-image: url('https://stmed.net/sites/default/files/blue-turquoise-wallpapers-25169-985169.jpg');
               overflow-x: hidden;
               overflow-y: hidden;
          }
     </style>
</head>
<body>
	
	<?php

	if(isset($_POST['uploadBtn']))
	{
		$fileName = $_FILES['myFile']['name'];
		$fileTmpName = $_FILES['myFile']['tmp_name'];
     	$extension = pathinfo($fileName,PATHINFO_EXTENSION);
     	
     	$allowedType=array('csv','xls');
     	if(!in_array($extension, $allowedType))
     	{
     		echo 'Invalid File Type';
     	}
     	else
     	{
     		$handle=fopen($fileName, 'r');
     		$count=0;
     		while(($myData=fgetcsv($handle,1000,','))!==FALSE){
     			$name=$myData[0];
     			$email=$myData[0];
     			
     			$count=$count+1;
     			
     			$connect = mysqli_connect("localhost", "root", "","testing");
				$sql="insert into customer(customer_id,customer_name,customer_email) values ($count,'".$name."','".$email."')";
				 #$connect->prepare($query);
				mysqli_query($connect, $sql);
                    
			}
				
     		
     		
     	}
	}

	?>

<form action="index.php" method="post" enctype="multipart/form-data" style="position: absolute;left:25%;width: 100% ;padding: 20px">
	<div class="form-group" style="border:1px solid #000;border-radius: 3px;width: 50%;text-align: center">
          <div style="color: #fff;background-color: #000;height: 35px"><label for="exampleInputFile" >Enter Mail</label></div>
		<textarea placeholder="Enter Mail" rows="25"  name="emailcontent" style="width: 100%;"></textarea><br>
		<div style="background-color: #fff"><label for="exampleInputFile">File Upload</label><br>
        <input type="File" name="myFile" class="form-control" id="File" style="width: 15%;margin-left: 315px;margin-top: 10px;margin-bottom: 10px" >
		<button type="submit" name="uploadBtn" class="btn btn-primary" style="margin-bottom: 10px;">Submit</button></div>
	</div>
	
</form>
</body>
</html>