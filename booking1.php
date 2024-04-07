<?php 
session_start();
if(!isset($_SESSION['user']))
{
	header("location: login.php");
}
require_once('Connection.php');

	$flightno = $_POST["flightno"];
	$username = $_SESSION['user'];
	$class = $_POST["class"];
	$quantity = $_POST["quantity"];
	$cur_date=date("Y-m-d");

	if(empty($flightno)||empty($username)||empty($class)||empty($quantity)||($quantity<=0)){
 		header("location:booking.php?Empty=please fill in the blanks");
 		die;
 	}
 	$query="select * from flight where flightno='$flightno'";
 	$result=mysqli_query($con, $query);
 	$row= mysqli_fetch_assoc($result);

 	if($cur_date>$row['date']){
 		header("location:booking.php?Invalid=Booking Closed");
 		die;
 	}
 	
 	$query="select * from booking where flightno='$flightno' AND username='$username' AND class='$class'";
 	$result=mysqli_query($con, $query);
 	$row= mysqli_fetch_assoc($result);

 	if($row>0){
	    header("location:booking.php?Invalid2=You have already booked");
	    die;
	}

 	if($class=='Economy'){

 		$query1="select * from seat where flightno='$flightno'";
 		$result1=mysqli_query($con, $query1);
 		$row= mysqli_fetch_assoc($result1);
 		if($row['cur_eco']>$quantity){
	 		$price=$row['eco_price']*$quantity;

	 		$sql="INSERT INTO booking (username, flightno,class, quantity, price, bdate)
					VALUES ('$username', '$flightno', 'Economy','$quantity','$price', '$cur_date')";

	    	if (mysqli_query($con, $sql)) {
	    		$cur=$row['cur_eco']-$quantity;
	    		$query = "update seat set cur_eco='$cur' where flightno='$flightno'";
				$result= mysqli_query($con,$query);
					if($result){
	       				header("location: welcome.php");
	    				die;
	    			}
	    			else{
	    				header("location:booking.php?Error=Something went wrong");
	    			}
	 		}
 		}else{
 			header("location:booking.php?Invalid1=Not Enough Seats");
 		die;
 		}
 	}
 	elseif ($class=='Premium Economy') {

 		$query1="select * from seat where flightno='$flightno'";
 		$result1=mysqli_query($con, $query1);
 		$row= mysqli_fetch_assoc($result1);
 		if($row['cur_preco']>$quantity){
	 		$price=$row['preeco_price']*$quantity;

	 		$sql="INSERT INTO booking (username, flightno,class, quantity, price, bdate)
					VALUES ('$username', '$flightno', 'Premium Economy','$quantity','$price', '$cur_date')";

	    	if (mysqli_query($con, $sql)) {
	    		$cur=$row['cur_preco']-$quantity;
	    		$query = "update seat set cur_preco='$cur' where flightno='$flightno'";
				$result= mysqli_query($con,$query);
					if($result){
	       				header("location: welcome.php");
	    				die;
	    			}
	    			else{
	    				header("location:booking.php?Error=Something went wrong");
	    			}
	 		}
 		}else{
 			header("location:booking.php?Invalid1=Not Enough Seats");
 		die;
 		}
 		
 	}
 	elseif($class=='First Class'){

 		$query1="select * from seat where flightno='$flightno'";
 		$result1=mysqli_query($con, $query1);
 		$row= mysqli_fetch_assoc($result1);
 		if($row['cur_first']>$quantity){
	 		$price=$row['first_price']*$quantity;

	 		$sql="INSERT INTO booking (username, flightno,class, quantity, price, bdate)
					VALUES ('$username', '$flightno', 'First Class','$quantity','$price', '$cur_date')";

	    	if (mysqli_query($con, $sql)) {
	    		$cur=$row['cur_first']-$quantity;
	    		$query = "update seat set cur_first='$cur' where flightno='$flightno'";
				$result= mysqli_query($con,$query);
					if($result){
	       				header("location: welcome.php");
	    				die;
	    			}
	    			else{
	    				header("location:booking.php?Error=Something went wrong");
	    			}
	 		}
 		}else{
 			header("location:booking.php?Invalid1=Not Enough Seats");
 		die;
 		}
 	}
 	elseif($class=='Business Class'){

 		$query1="select * from seat where flightno='$flightno'";
 		$result1=mysqli_query($con, $query1);
 		$row= mysqli_fetch_assoc($result1);
 		if($row['cur_first']>$quantity){
	 		$price=$row['first_price']*$quantity;

	 		$sql="INSERT INTO booking (username, flightno,class, quantity, price, bdate)
					VALUES ('$username', '$flightno', 'Business Class','$quantity','$price', '$cur_date')";

	    	if (mysqli_query($con, $sql)) {
	    		$cur=$row['cur_bus']-$quantity;
	    		$query = "update seat set cur_bus='$cur' where flightno='$flightno'";
				$result= mysqli_query($con,$query);
					if($result){
	       				header("location: welcome.php");
	    				die;
	    			}
	    			else{
	    				header("location:booking.php?Error=Something went wrong");
	    			}
	 		}
 		}else{
 			header("location:booking.php?Invalid1=Not Enough Seats");
 		die;
 		}
 	}