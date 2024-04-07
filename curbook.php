<?php 

session_start();
if(!isset($_SESSION['user']))
{
	header("location: login.php");
}
require_once('Connection.php');

$username=$_SESSION['user'];
$sql="select * from flight f ,booking b where b.username='$username' AND f.flightno=b.flightno";

$result=mysqli_query($con, $sql);

if(mysqli_num_rows($result)>0){
	echo '<table>';
	echo '<tr>';
	echo '<th>'; echo'Flight No'; echo '</th>';
	echo '<th>'; echo'Deperture'; echo '</th>';
	echo '<th>'; echo'Destination'; echo '</th>';
	echo '<th>'; echo'Travel Date'; echo '</th>';
	echo '<th>'; echo'Time'; echo '</th>';
	echo '<th>'; echo'Class'; echo '</th>';
	echo '<th>'; echo'Quantity'; echo '</th>';
	echo '<th>'; echo'Price'; echo '</th>';
	echo '<th>'; echo'Booking Date'; echo '</th>';	
	echo '</tr>';
	while ($row=mysqli_fetch_assoc($result)) {
		echo '<tr>';
		echo '<td>' .$row['flightno']. '</td>';
		echo '<td>' .$row['deperture']. '</td>';
		echo '<td>' .$row['destination']. '</td>';
		echo '<td>' .$row['date']. '</td>';
		echo '<td>' .$row['time']. '</td>'; 
		echo '<td>' .$row['class']. '</td>';
		echo '<td>' .$row['quantity']. '</td>'; 
		echo '<td>' .$row['price']. '</td>';
		echo '<td>' .$row['bdate']. '</td>';
		echo '</tr>';
	}
	echo '</table>';
}else{
	echo 'No Results';
}
?>
<a href="welcome.php?">Back</a>

