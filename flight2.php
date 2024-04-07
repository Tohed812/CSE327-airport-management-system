<?php 

session_start();
if(!isset($_SESSION['Admin']))
{
	header("location: login.php");
}
require_once('Connection.php');

	$flightno=$_POST['flightno'];
	$dep=$_POST['dep'];
	$des=$_POST['des'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$eco_seat=$_POST['eco_seat'];
	$eco_price=$_POST['eco_price'];
	$preeco_seat=$_POST['preeco_seat'];
	$preeco_price=$_POST['preeco_price'];
	$first_seat=$_POST['first_seat'];
	$first_price=$_POST['first_price'];
	$bus_seat=$_POST['bus_seat'];
	$bus_price=$_POST['bus_price'];
	$cur_date=date("Y-m-d");

	if(empty($flightno)||empty($dep)||empty($des)||empty($date)||empty($time)||empty($eco_seat)||empty($eco_price)||empty($preeco_seat)||empty($preeco_price)||empty($first_seat)||empty($first_price)||empty($bus_seat)||empty($bus_price)){
 		header("location:flight.php?Empty=please fill in the blanks");
 		die;
 	}

 	if($cur_date>=$date){
 		header("location:flight.php?Invalid=Not valid Date");
 		die;
 	}


 	else{

 		$sql="INSERT INTO flight (flightno, deperture,destination, date, time)
				VALUES ('$flightno', '$dep', '$des','$date', '$time')";

		
		$sql1="INSERT INTO seat (flightno, eco_seat, eco_price, preeco_seat, preeco_price, first_seat,first_price, bus_seat, bus_price, cur_eco, cur_preco, cur_first, cur_bus)
				VALUES ('$flightno', '$eco_seat', '$eco_price','$preeco_seat', '$preeco_price', '$first_seat', '$first_price', '$bus_seat','$bus_price', '$eco_seat', '$preeco_seat', '$first_seat', '$bus_seat')";
			

    	if (mysqli_query($con, $sql) && mysqli_query($con, $sql1)) {
       	header("location: adminpage.php");
    	die;
 		}
 	}