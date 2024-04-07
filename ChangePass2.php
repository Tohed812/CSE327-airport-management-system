<?php 

session_start();
if(!isset($_SESSION['user']))
{
	header("location: login.php");
}
require_once('Connection.php');

$Current_Password=$_POST['oldpass'];
$New_Password=$_POST['newpass'];
$user=$_SESSION['user'];

$username=$_SESSION['user'];
$query1 = "select * from user where username='$username'";
$result= mysqli_query($con,$query1);
$row=mysqli_fetch_array($result);


if($Current_Password==$row['password'] && !empty($New_Password))
{
	$query = "update user set password='$New_Password' where username='$user'";
	$result= mysqli_query($con,$query);

	if($result)
	{
		
		header("location: welcome.php");
		die;
	}
	else{
		header("location:ChangePass.php?Error=Something went wrong");


	}

}

else
{
	header("location:ChangePass.php?Invalid=please give the correct information");
}
?>
