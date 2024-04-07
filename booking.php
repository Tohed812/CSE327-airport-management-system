<?php 
session_start();
if(!isset($_SESSION['user']))
{
	header("location: login.php");
}
require_once('Connection.php');

	$query = "select * from flight";
	$result= mysqli_query($con,$query);

	if(mysqli_num_rows($result)>0){
	echo '<table>';
	echo '<tr>';
	echo '<th>'; echo'Flight No'; echo '</th>';
	echo '<th>'; echo'Deperture'; echo '</th>';
	echo '<th>'; echo'Destination'; echo '</th>';
	echo '<th>'; echo'Date'; echo '</th>';
	echo '<th>'; echo'Time'; echo '</th>';
	echo '</tr>';
	while ($row=mysqli_fetch_assoc($result)) {
		echo '<tr>';
		echo '<td>' .$row['flightno']. '</td>';
		echo '<td>' .$row['deperture']. '</td>';
		echo '<td>' .$row['destination']. '</td>';
		echo '<td>' .$row['date']. '</td>';
		echo '<td>' .$row['time']. '</td>'; 
		echo '</tr>';
	}
	echo '</table>';
}else{
	echo 'No Flights';
}
?>
<a href="welcome.php?">Back</a>

<!DOCTYPE html>
<html>
<head>
    <title> Book Flight </title>
</head>
<body>
    <div class="header">
        <h1> Book Flight </h1>
    </div> 

    <?php
        if(@$_GET['Empty']==true){
     ?>
        <div class="alert-light text-danger"><?php echo $_GET['Empty']?></div>
    <?php
        }
    ?>

    <?php
        if(@$_GET['Invalid']==true){
     ?>
        <div class="alert-light text-danger"><?php echo $_GET['Invalid']?></div>
    <?php
        }
    ?>

    <?php
        if(@$_GET['Invalid1']==true){
     ?>
        <div class="alert-light text-danger"><?php echo $_GET['Invalid1']?></div>
    <?php
        }
    ?>

    <?php
        if(@$_GET['Invalid2']==true){
     ?>
        <div class="alert-light text-danger"><?php echo $_GET['Invalid2']?></div>
    <?php
        }
    ?>
    
    <form action="booking1.php" method="POST">
        <table>
            <tr>
                <td> Flight Number</td>
                <td><input type="text" name="flightno"></td>
            </tr>
            <tr>
                <td> Class</td>
                <td><label for "Economy">Economy</label></td>
                <td><input type="radio" id='Economy'name="class" value="Economy"></td>
                <td><label for "Premium Economy">Premium Economy</label></td>
                <td><input type="radio" id='Premium Economy' name="class" value="Premium Economy"></td>
                <td><label for "First Class">First Class</label></td>
                <td><input type="radio" id='First Class'name="class" value="First Class"></td>
                <td><label for "Business">Business Class</label></td>
                <td><input type="radio" id='Business'name="class" value="Business Class"></td>
            </tr>
            <tr>
                <td> Quantity</td>
                <td><input type="text" name="quantity"></td>
            </tr>
            <tr>
                <td><button class="btn btn-success" name="confirm"> Confirm</button></td>
            </tr>
        </table>
    </form>

</body>
</html>