<?php
require_once("connection.php");
session_start();

$username=$_POST['username'];
$password=$_POST['password'];
 
if(isset($_POST['SignUp'])){
 	header("location:SignUp.php");
}

//User Login

 else if(isset($_POST['Login']))
 {
 	if(empty($_POST['username'])||empty($_POST['password'])){
 		header("location:login.php?Empty=please fill in the blanks");
 	}
 	else{
 		$query="select * from user where username='".$_POST['username']."' and password='".$_POST['password']."' ";
 		$result=mysqli_query($con, $query);
 		if(mysqli_fetch_assoc($result)){
 			$_SESSION['user']=$_POST['username'];
 			header("location:welcome.php");
 		}
 		else{
 			header("location:login.php?Invalid=please give the correct information");
 	}
 		}
 	
 }
 //Admin Login

 else if(isset($_POST['Admin'])){
 	 	if(empty($_POST['username'])||empty($_POST['password'])){
 		header("location:login.php?Empty=please fill in the blanks");
 	}
 	else{
 		$query="select * from admin where admin='".$_POST['username']."' and pass='".$_POST['password']."' ";
 		$result=mysqli_query($con, $query);
 		if(mysqli_fetch_assoc($result)){
 			$_SESSION['Admin']=$_POST['username'];
 			header("location:adminpage.php");
 		}
 		else{
 			header("location:login.php?Invalid=please give the correct information");
 	}
 		}
 }
 else{
 	echo 'not working';
 }
?>