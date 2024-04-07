<?php
session_start();
if (isset($_SESSION['user'])) {

    require_once('Connection.php');
    $username = $_SESSION['user'];
    $query = "select * from user where username='$username'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

   
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<style>';
    echo 'body { font-family: Arial, sans-serif; background-color: #f2f2f2; }';
    echo '.container { max-width: 400px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1); }';
    echo '</style>';
    echo '</head>';
    echo '<body>';
    echo '<div class="container">';
    
    echo '<h1>Welcome ' . $_SESSION['user'] . '</h1>';
    
    echo '<p><strong>Name:</strong> ' . $row['fname'] . ' ' . $row['lname'] . '</p>';
    
    echo '<p><strong>Email:</strong> ' . $row['email'] . '</p>';

    echo '<p><strong>Passport Number:</strong> ' . $row['passno'] . '</p>';

    echo '<p><strong>Phone Number:</strong> ' . $row['pno'] . '</p>';

    echo '<p><strong>Sex:</strong> ' . $row['sex'] . '</p>';

    echo '<a href="schedule.php?Schedule">Flight Schedule</a> <br/>';
    echo '<a href="booking.php?Book Flight">Book Flight</a> <br/>';
    echo '<a href="curbook.php?Check Bookings">Check Current Booking</a> <br/>';
    echo '<a href="cancelb.php?Cancel Booking">Cancel Booking</a><br/>';
    echo '<a href="ChangePass.php?Change Password">Change Password</a><br/>';
    echo '<a href="logout.php?logout">Logout</a>';

    echo '</div>'; // Close container
    echo '</body>';
    echo '</html>';

} else {
    header("location: login.php");
}
?>