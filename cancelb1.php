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

    if(empty($flightno)||empty($username)||empty($class)){
        header("location:cancelb.php?Empty=please fill in the blanks");
        die;
    }

    $query="select * from booking where flightno='$flightno' AND username='$username' AND class='$class'";
    $result=mysqli_query($con, $query);
    $row= mysqli_fetch_assoc($result);
    $quantity=$row['quantity'];

    if($row>0){
        $query1="delete from booking where flightno='$flightno' AND username='$username' AND class='$class'";
        $result1=mysqli_query($con, $query1);
        if($result1){

            $query2="select * from seat where flightno='$flightno'";
            $result2=mysqli_query($con, $query2);
            $row= mysqli_fetch_assoc($result2);

            if($class=='Economy'){
                $cur=$row['cur_eco']+$quantity;

                $query3 = "update seat set cur_eco='$cur' where flightno='$flightno'";
                $result3= mysqli_query($con,$query3);
                    if($result3){
                        header("location: welcome.php");
                        die;
                    }
                    else{
                        header("location:cancelb.php?Error=Something went wrong");
                    }
            }elseif ($class=='Premium Economy') {
                $cur=$row['cur_preco']+$quantity;

                $query3 = "update seat set cur_preco='$cur' where flightno='$flightno'";
                $result3= mysqli_query($con,$query3);
                    if($result3){
                        header("location: welcome.php");
                        die;
                    }
                    else{
                        header("location:cancelb.php?Error=Something went wrong");
                    }
            }elseif ($class=='First Class') {
                $cur=$row['cur_first']+$quantity;

                $query3 = "update seat set cur_first='$cur' where flightno='$flightno'";
                $result3= mysqli_query($con,$query3);
                    if($result3){
                        header("location: welcome.php");
                        die;
                    }
                    else{
                        header("location:cancelb.php?Error=Something went wrong");
                    }
            }elseif ($class=='Business Class') {
                $cur=$row['cur_bus']+$quantity;
                $query3 = "update seat set cur_bus='$cur' where flightno='$flightno'";
                $result3= mysqli_query($con,$query3);
                    if($result3){
                        header("location: welcome.php");
                        die;
                    }
                    else{
                        header("location:cancelb.php?Error=Something went wrong");
                    }
            }
        }else{
             header("location:cancelb.php?Error=Something went wrong");
            }
        }else{
            header("location:cancelb.php?Invalid=No Booking Found");
        }
        