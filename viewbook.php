<?php
session_start();
if(!isset($_SESSION['Admin']))
{
	header("location: login.php");
}
require_once('Connection.php');

$sql="select * from booking group by flightno, Class";

$result=mysqli_query($con, $sql);

if(mysqli_num_rows($result)>0){
	echo '<table>';
	echo '<tr>';
	echo '<th>'; echo'Flight No'; echo '</th>';
	echo '<th>'; echo'Username'; echo '</th>';
	echo '<th>'; echo'Class'; echo '</th>';
	echo '<th>'; echo'Quantity'; echo '</th>';
	echo '<th>'; echo'Booking Date'; echo '</th>';
	echo '</tr>';
	while ($row=mysqli_fetch_assoc($result)) {
		echo '<tr>';
		echo '<td>' .$row['flightno']. '</td>';
		echo '<td>' .$row['username']. '</td>';
		echo '<td>' .$row['class']. '</td>';
		echo '<td>' .$row['quantity']. '</td>';
		echo '<td>' .$row['bdate']. '</td>'; 
		echo '</tr>';
	}
	echo '</table>';
}else{
	echo 'No Results';
}