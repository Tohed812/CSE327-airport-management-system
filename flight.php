<?php 
    session_start();
    if(isset($_SESSION['Admin'])){
    
        if(isset($_GET['Create New Flight']))
        {
            //echo "hello";
        }
    }
    else
    {
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title> Create Flight </title>
</head>
<body>
    <div class="header">
        <h1> Create Flight </h1>
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
    
    <form action="flight2.php" method="POST">
        <table>
            <tr>
                <td> Flight Number</td>
                <td><input type="text" name="flightno"></td>
            </tr>
            <tr>
                <td> Departure</td>
                <td><input type="text" name="dep"></td>
            </tr>
            <tr>
                <td> Destination</td>
                <td><input type="text" name="des"></td>
            </tr>
            <tr>
                <td> Date</td>
                <td><input type="date" name="date"></td>
            </tr>
            <tr>
                <td> Time</td>
                <td><input type="Time" name="time"></td>
            </tr>
            <tr>
                <td>Economy</td>
                <td><input type="number" name="eco_seat"></td>
            </tr>
            <tr>
                <td> Economy Price</td>
                <td><input type="number" name="eco_price"></td>
            </tr>
            <tr>
                <td> Premium Economy</td>
                <td><input type="number" name="preeco_seat"></td>
            </tr>
            <tr>
                <td> Premium Economy Price</td>
                <td><input type="number" name="preeco_price"></td>
            </tr>
            <tr>
                <td> First Class</td>
                <td><input type="number" name="first_seat"></td>
            </tr>
            <tr>
                <td> First Class Price</td>
                <td><input type="number" name="first_price"></td>
            </tr>
            <tr>
                <td> Business Class</td>
                <td><input type="number" name="bus_seat"></td>
            </tr>
            <tr>
                <td> Business Class Price</td>
                <td><input type="number" name="bus_price"></td>
            </tr>
            <tr>
                <td><button class="btn btn-success" name="confirm"> Confirm</button></td>
            </tr>
        </table>
    </form>

</body>
</html>

<a href="adminpage.php?">Back</a>

