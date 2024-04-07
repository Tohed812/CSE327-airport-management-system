<?php

session_start();
if(!isset($_SESSION['Admin']))
{
    header("location: login.php");
}
require_once('Connection.php');

$flightno= $_POST["flightno"];

if(empty($flightno)){
    header("location:deleteflight.php?Empty=please fill in the blanks");
        die;
}

$sql="select* from flight where flightno='$flightno'";
$result=mysqli_query($con, $sql);
$row= mysqli_fetch_assoc($result);

if($row>0){
    $sql="delete from flight where flightno='$flightno'";
    $result=mysqli_query($con, $sql);
    if($result){
        header("location:adminpage.php?");
        die;
    }else{
        header("location:deleteflight.php?Invalid=something went wrong");
        die;
    }
}else{
    header("location:deleteflight.php?Invalid1=Flight Doesnt Exist");
        die;
}
