<?php
require_once("connection.php");
session_start();

	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$dob = $_POST["dob"];
	$email = $_POST["email"];
	$passno = $_POST["passno"];
	$pno = $_POST["pno"];
	$sex = $_POST["sex"];
	$username = $_POST["username"];
	$password = $_POST["password"];

	$query="select * from user where username='$username'";
 		$result=mysqli_query($con, $query);
 		if(mysqli_fetch_assoc($result)){
 			header("location:SignUp.php?UsernameExists=please change username");
 		die;
 		}
 
 	if(empty($fname)||empty($lname)||empty($dob)||empty($email)||empty($passno)||empty($pno)||empty($sex)||empty($username)||empty($password)){
 		header("location:SignUp.php?Empty=please fill in the blanks");
 		die;
 	}
 	else{

 		$sql="INSERT INTO user (fname, lname,dob, email, passno,pno, sex,username,password)
				VALUES ('$fname', '$lname', '$dob','$email', '$passno', '$pno', '$sex','$username','$password')";

    	if (mysqli_query($con, $sql)) {
       	header("location: login.php");
    		die;
 		}
 	}

?>