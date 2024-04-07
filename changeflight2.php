<!DOCTYPE html>
<html>
	<body>

		<form action="changeflight3.php" method="POST">
        <table>

<?php	
session_start();
if(!isset($_SESSION['Admin']))
{
	header("location: login.php");
}
require_once('Connection.php');

$flightno= $_POST["flightno"];

if(empty($flightno)){
	header("location:changeflight.php?Empty=please fill in the blanks");
 		die;
}else{
	
	$query = "select * from flight f, seat s where f.flightno='$flightno' and s.flightno='$flightno'";
	$_SESSION['flight']=$_POST['flightno'];
	$result= mysqli_query($con,$query);
	$row=mysqli_fetch_array($result);

	echo 'Deperture: '; echo $row['deperture'];echo '<br/>';
	?>
            <tr>
                <td> New Deperture:</td>
                <td><input type="text" name="newdep"></td>
            </tr>
<?php
	
	echo 'Destination: '; echo $row['destination'];echo '<br/>';

		?>
		
            <tr>
                <td> New Destination:</td>
                <td><input type="text" name="newdes"></td>
            </tr>
<?php

echo 'Date: '; echo $row['date'];echo '<br/>';

		?>
            <tr>
                <td> New Date:</td>
                <td><input type="date" name="newdate"></td>
            </tr>
<?php

echo 'Time: '; echo $row['time'];echo '<br/>';

		?>

            <tr>
                <td> New Time:</td>
                <td><input type="Time" name="newtime"></td>
            </tr>
<?php

echo 'Economy Seat: '; echo $row['eco_seat'];echo '<br/>';

		?>
            <tr>
                <td> New Economy Seat:</td>
                <td><input type="text" name="neweco_seat"></td>
            </tr>
<?php

echo 'Economy Price: '; echo $row['eco_price'];echo '<br/>';

		?>
            <tr>
                <td> New Economy Price:</td>
                <td><input type="text" name="neweco_price"></td>
            </tr>
<?php

echo 'Premium Economy Seat: '; echo $row['preeco_seat'];echo '<br/>';

		?>
		<!DOCTYPE html>
            <tr>
                <td> New Pre Economy Seat:</td>
                <td><input type="text" name="newpreeco_seat"></td>
            </tr>
<?php
echo 'Pre Economy Price: '; echo $row['preeco_price'];echo '<br/>';

		?>
            <tr>
                <td> New Pre Economy Price:</td>
                <td><input type="text" name="newpreeco_price"></td>
            </tr>
<?php

echo 'First Class Seat: '; echo $row['first_seat'];echo '<br/>';

		?>
            <tr>
                <td> New First Class Seat:</td>
                <td><input type="text" name="newfirst_seat"></td>
            </tr>
<?php
echo 'First Class Price: '; echo $row['first_price'];echo '<br/>';

		?>
            <tr>
                <td> New First Class Price:</td>
                <td><input type="text" name="newfirst_price"></td>
            </tr>
<?php

echo 'Business Class Seat: '; echo $row['bus_seat'];echo '<br/>';

		?>
            <tr>
                <td> New Business Class Seat:</td>
                <td><input type="text" name="newbus_seat"></td>
            </tr>
<?php
echo 'Business Class Price: '; echo $row['bus_price'];echo '<br/>';

		?>
		<!DOCTYPE html>
            <tr>
                <td> New Business Class Price:</td>
                <td><input type="text" name="newbus_price"></td>
            </tr>

            <tr>
                <td><button class="btn btn-success" name="confirm"> Confirm</button></td>
            </tr>

<?php
}
?>
        </table>
    </form>

</body>
</html>
<a href="adminpage.php?">Back</a>