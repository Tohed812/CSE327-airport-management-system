<?php
 $con=mysqli_connect('localhost', 'root', '', 'airport');
 if(!$con)
 {
 	die('check your connection'.mysqli_error());
 }
?>