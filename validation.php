<?php


session_start();

$con=mysqli_connect('localhost','root','');

mysqli_select_db($con,'registrationdata');

$name=$_POST['Username'];
$pass=$_POST['Pass'];

$s="select * from userdata where Username='$name' && Password='$pass";

$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1)
{

	
	header('location:login.php');
}
else
{
	
header('location:home.php');
}

?>