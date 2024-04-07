<?php	
session_start();
if(!isset($_SESSION['Admin']))
{
	header("location: login.php");
}
require_once('Connection.php');

	$flightno=$_SESSION['flight'];
	$dep=$_POST['newdep'];
	$des=$_POST['newdes'];
	$date=$_POST['newdate'];
	$time=$_POST['newtime'];
	$eco_seat=$_POST['neweco_seat'];
	$eco_price=$_POST['neweco_price'];
	$preeco_seat=$_POST['newpreeco_seat'];
	$preeco_price=$_POST['newpreeco_price'];
	$first_seat=$_POST['newfirst_seat'];
	$first_price=$_POST['newfirst_price'];
	$bus_seat=$_POST['newbus_seat'];
	$bus_price=$_POST['newbus_price'];

	
if(!empty($dep))
{
	$query = "update flight set deperture='$dep' where flightno='$flightno'";
	$result= mysqli_query($con,$query);

	if(!$result)
	{
		
		header("location:Changeflight2.php?Error=Something went wrong");
	}
}
if(!empty($des))
{
	$query = "update flight set destination='$des' where flightno='$flightno'";
	$result= mysqli_query($con,$query);

	if(!$result)
	{
		
		header("location:Changeflight2.php?Error=Something went wrong");
	}
}
if(!empty($date))
{
	$query = "update flight set date='$date' where flightno='$flightno'";
	$result= mysqli_query($con,$query);

	if(!$result)
	{
		
		header("location:Changeflight2.php?Error=Something went wrong");
	}
}
if(!empty($time))
{
	$query = "update flight set time='$time' where flightno='$flightno'";
	$result= mysqli_query($con,$query);

	if(!$result)
	{
		
		header("location:Changeflight2.php?Error=Something went wrong");
	}
}
if(!empty($eco_seat))
{
	$query1="select* from seat where flightno='$flightno'";
	$result= mysqli_query($con,$query1);
	$row=mysqli_fetch_assoc($result);
	$cur=$eco_seat-$row['eco_seat'];
	$cur1=$row['cur_eco']+$cur;

	if($cur1>=0){
		$query = "update seat set eco_seat='$eco_seat', cur_eco='$cur1' where flightno='$flightno'";
		$result= mysqli_query($con,$query);

		if(!$result)
		{
			
			header("location:Changeflight2.php?Error=Something went wrong");
		}
	}else{
		header("location:Changeflight2.php?Error=Something went wrong");
	}
}
if(!empty($eco_price))
{
	$query = "update seat set eco_price='$eco_price' where flightno='$flightno'";
	$result= mysqli_query($con,$query);

	if(!$result)
	{
		
		header("location:Changeflight2.php?Error=Something went wrong");
	}
}
if(!empty($preeco_seat))
{	
	$query1="select* from seat where flightno='$flightno'";
	$result= mysqli_query($con,$query1);
	$row=mysqli_fetch_assoc($result);
	$cur=$preeco_seat-$row['preeco_seat'];
	$cur1=$row['cur_preco']+$cur;

	if($cur1>=0){
		$query = "update seat set preeco_seat='$preeco_seat',cur_preco='$cur1' where flightno='$flightno'";
		$result= mysqli_query($con,$query);

		if(!$result)
		{
			
			header("location:Changeflight2.php?Error=Something went wrong");
		}
	}else{
		header("location:Changeflight2.php?Error=Something went wrong");
	}
}
if(!empty($preeco_price))
{
	$query = "update seat set preeco_price='$preeco_price' where flightno='$flightno'";
	$result= mysqli_query($con,$query);

	if(!$result)
	{
		
		header("location:Changeflight2.php?Error=Something went wrong");
	}
}
if(!empty($first_seat))
{
	
	$query1="select* from seat where flightno='$flightno'";
	$result= mysqli_query($con,$query1);
	$row=mysqli_fetch_assoc($result);
	$cur=$first_seat-$row['first_seat'];
	$cur1=$row['cur_first']+$cur;

	if($cur1>=0){
		$query = "update seat set first_seat='$first_seat', cur_first='$cur1' where flightno='$flightno'";
		$result= mysqli_query($con,$query);

		if(!$result)
		{
			
			header("location:Changeflight2.php?Error=Something went wrong");
		}
	}else{
		header("location:Changeflight2.php?Error=Something went wrong");
	}
}
if(!empty($first_price))
{
	$query = "update seat set first_price='$first_price' where flightno='$flightno'";
	$result= mysqli_query($con,$query);

	if(!$result)
	{
		
		header("location:Changeflight2.php?Error=Something went wrong");
	}
}
if(!empty($bus_seat))
{
	$query1="select* from seat where flightno='$flightno'";
	$result= mysqli_query($con,$query1);
	$row=mysqli_fetch_assoc($result);
	$cur=$bus_seat-$row['bus_seat'];
	$cur1=$row['cur_bus']+$cur;

	if($cur1>=0){
		$query = "update seat set bus_seat='$bus_seat', cur_bus='$cur1' where flightno='$flightno'";
		$result= mysqli_query($con,$query);

		if(!$result)
		{
			
			header("location:Changeflight2.php?Error=Something went wrong");
		}
	}else{
		header("location:Changeflight2.php?Error=Something went wrong");
	}
}
if(!empty($bus_price))
{
	$query = "update seat set bus_price='$bus_price' where flightno='$flightno'";
	$result= mysqli_query($con,$query);

	if(!$result)
	{
		
		header("location:Changeflight2.php?Error=Something went wrong");
	}
}

	header("location:Changeflight2.php");