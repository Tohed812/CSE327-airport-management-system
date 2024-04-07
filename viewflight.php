<!DOCTYPE html>
<body>
<?php

session_start();
if(!isset($_SESSION['Admin']))
{
	header("location: login.php");
}
require_once('Connection.php');

$sql="select * from flight f, seat s where f.flightno=s.flightno";

$result=mysqli_query($con, $sql);

if(mysqli_num_rows($result)>0){
	echo '<table>';
	echo '<tr>';
	echo '<th>'; echo'Flight No'; echo '</th>';
	echo '<th>'; echo'Deperture'; echo '</th>';
	echo '<th>'; echo'Destination'; echo '</th>';
	echo '<th>'; echo'Date'; echo '</th>';
	echo '<th>'; echo'Time'; echo '</th>';
	echo '<th>'; echo'Economy Seat'; echo '</th>';
	echo '<th>'; echo'Economy Price'; echo '</th>';
	echo '<th>'; echo'Premium Economy Seat'; echo '</th>';
	echo '<th>'; echo'Premium Economy Price'; echo '</th>';
	echo '<th>'; echo'First Class Seat'; echo '</th>';
	echo '<th>'; echo'First Class Price'; echo '</th>';
	echo '<th>'; echo'Busines Class Seat'; echo '</th>';
	echo '<th>'; echo'Busines Class Price'; echo '</th>';
	echo '<th>'; echo'Empty Economy Seat'; echo '</th>';
	echo '<th>'; echo'Empty Premium Economy Seat'; echo '</th>';
	echo '<th>'; echo'Empty First Class Seat'; echo '</th>';
	echo '<th>'; echo'Empty Busines Class Seat'; echo '</th>';
	echo '</tr>';
	while ($row=mysqli_fetch_assoc($result)) {
		echo '<tr>';
		echo '<td>' .$row['flightno']. '</td>';
		echo '<td>' .$row['deperture']. '</td>';
		echo '<td>' .$row['destination']. '</td>';
		echo '<td>' .$row['date']. '</td>';
		echo '<td>' .$row['time']. '</td>'; 
		echo '<td>' .$row['eco_seat']. '</td>'; 
		echo '<td>' .$row['eco_price']. '</td>'; 
		echo '<td>' .$row['preeco_seat']. '</td>'; 
		echo '<td>' .$row['preeco_price']. '</td>';
		echo '<td>' .$row['first_seat']. '</td>' ;
		echo '<td>' .$row['first_price']. '</td>';
		echo '<td>' .$row['bus_seat']. '</td>';
		echo '<td>' .$row['bus_price']. '</td>';
		echo '<td>' .$row['cur_eco']. '</td>';
		echo '<td>' .$row['cur_preco']. '</td>';
		echo '<td>' .$row['cur_first']. '</td>';
		echo '<td>' .$row['cur_bus']. '</td>';
		echo '</tr>';
	}
	echo '</table>';
}else{
	echo 'No Results';
}

?>
</body>
</html>
<a href="adminpage.php?">Back</a>