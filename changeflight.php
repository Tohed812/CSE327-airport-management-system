<?php

session_start();
if(!isset($_SESSION['Admin']))
{
	header("location: login.php");
}
require_once('Connection.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title> Select Flight </title>
</head>
<body>
    <div class="header">
        <h1> Select Flight </h1>
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
    
    <form action="changeflight2.php" method="POST">
        <table>
            <tr>
                <td> Flight Number</td>
                <td><input type="text" name="flightno"></td>
            </tr>
         	<tr>
                <td><button class="btn btn-success" name="confirm"> Confirm</button></td>
            </tr>
        </table>
    </form>

</body>
</html>

<a href="adminpage.php?">Back</a>
