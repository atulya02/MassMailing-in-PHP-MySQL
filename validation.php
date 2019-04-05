<?php


session_start();

$con=mysqli_connect('localhost','root','');

mysqli_select_db($con,'registrationdata');

$name=$_POST['Username'];
$pass=$_POST['PassLogin'];



$sql="Select * from userdata where Username='$name'";

$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
if($num>0)
{
		$row= mysqli_fetch_array($result);
	
		if(password_verify($pass, $row['Password']))
		{
			header('location:home.php');
		}
		else
		{
			$_SESSION['message'] = 'Your Login Name or Password is invalid';
			header('location:login_new.php');
		}

	

	
	
}
else
{
	
	$_SESSION['message'] = 'Your Login Name or Password is invalid';
	header('location:login_new.php');

}

?>