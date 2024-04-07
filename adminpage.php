<?php
session_start();
 if(isset($_SESSION['Admin'])){
 	require_once('Connection.php');
   
   $username=$_SESSION['Admin'];
   $query = "select * from admin where admin='$username'";
   $result= mysqli_query($con,$query);
   $row=mysqli_fetch_array($result);

    echo 'welcome ' .$_SESSION['Admin'].'<br/>';

    echo '<a href="logout.php?logout">Logout</a><br/>';
    echo '<a href="flight.php?Create New Flight">Create New Flight</a><br/>';
    echo '<a href="changeflight.php?Edit Flights">Edit Flights</a><br/>';
    echo '<a href="viewflight.php?View flight">View flight</a><br/>';
    echo '<a href="viewuser.php?viewuser">View User</a><br/>';
    echo '<a href="deleteflight.php?Delete Flight">Delete Flight</a><br/>';
    echo '<a href="viewbook.php?View Booking">View Booking</a>';
 }
?>
