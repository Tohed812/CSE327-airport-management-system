<?php

session_start();
if(!isset($_SESSION['Admin']))
{
    header("location: login.php");
}
require_once('Connection.php');

$sql="select * from flight";

$result=mysqli_query($con, $sql);

if(mysqli_num_rows($result)>0){
    echo '<table>';
    echo '<tr>';
    echo '<th>'; echo'Flight No'; echo '</th>';
    echo '</tr>';
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' .$row['flightno']. '</td>';
        echo '</tr>';
    }
    echo '</table>';
}else{
    echo 'No Results';
}
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

    <?php
        if(@$_GET['Invalid1']==true){
     ?>
        <div class="alert-light text-danger"><?php echo $_GET['Invalid1']?></div>
    <?php
        }
    ?>
    
    <form action="deleteflight2.php" method="POST">
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