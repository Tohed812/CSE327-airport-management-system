<?php 

session_start();
if(!isset($_SESSION['user']))
{
    header("location: login.php");
}
require_once('Connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .header {
            text-align: center;
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
        }

        .container {
            max-width: 300px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .alert-light {
            background-color: #f8d7da;
            color: #721c24;
            padding: 5px;
            border: 1px solid #f5c6cb;
            border-radius: 3px;
            margin: 10px 0;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Change Password</h1>
    </div>
    <?php
        if(@$_GET['Error'] == true) {
    ?>
    <div class="alert-light text-danger"><?php echo $_GET['Error'] ?></div>
    <?php
        }
    ?>
    <?php
        if(@$_GET['Invalid'] == true) {
    ?>
    <div class="alert-light text-danger"><?php echo $_GET['Invalid'] ?></div>
    <?php
        }
    ?>
    <div class="container">
        <form action="ChangePass2.php" method="POST">
            <input type="password" name="oldpass" placeholder="Old Password" required>
            <input type="password" name="newpass" placeholder="New Password" required>
            <button class="btn" name="confirm">Confirm</button>
        </form>
    </div>
</body>
</html>
<a href="welcome.php?">Back</a>