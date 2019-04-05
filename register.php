<?php


session_start();

$con=mysqli_connect('localhost','root','');

mysqli_select_db($con,'registrationdata');

$fullname=$_POST['name'];
$email=$_POST['email'];
$name=$_POST['Username'];
$pass=$_POST['Pass'];
$pass=password_hash($pass, PASSWORD_DEFAULT);

$s="select * from userdata where Username='$name'";

$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1)
{
	echo "Username already taken";
}
else
{
	$reg="insert into userdata values('$fullname','$email','$name','$pass')";
	mysqli_query($con,$reg);
	echo "Registration Successful";


}

?>