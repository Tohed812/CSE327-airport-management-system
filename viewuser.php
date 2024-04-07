<?php

session_start();
if(!isset($_SESSION['Admin']))
{
	header("location: login.php");
}
require_once('Connection.php');

$sql="select * from user";

$result=mysqli_query($con, $sql);

if(mysqli_num_rows($result)>0){
	echo '<table>';
	echo '<tr>';
	echo '<th>'; echo'First Name'; echo '</th>';
	echo '<th>'; echo'Last Name'; echo '</th>';
	echo '<th>'; echo'Email'; echo '</th>';
	echo '<th>'; echo'Phone No'; echo '</th>';
	echo '</tr>';
	while ($row=mysqli_fetch_assoc($result)) {
		echo '<tr>';
		echo '<td>' .$row['fname']. '</td>';
		echo '<td>' .$row['lname']. '</td>';
		echo '<td>' .$row['email']. '</td>';
		echo '<td>' .$row['pno']. '</td>';
		echo '</tr>';
	}
	echo '</table>';
}else{
	echo 'No Results';
}

?>

<a href="adminpage.php?">Back</a>