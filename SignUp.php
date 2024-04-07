<!DOCTYPE html>
<html>
<head>
	<title> SignUp </title>
	 <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            text-align: left;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .submit-btn {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
	<div class="header">
		<h1> SignUp </h1>
	</div> 

	<?php
	    if(@$_GET['Empty']==true){
	 ?>
	    <div class="alert-light text-danger"><?php echo $_GET['Empty']?></div>
	<?php
	    }
	?>
	<?php
	    if(@$_GET['UsernameExists']==true){
	 ?>
	    <div class="alert-light text-danger"><?php echo $_GET['UsernameExists']?></div>
	<?php
	    }
	?>
	
	<form action="AccntCr.php" method="POST">
		<div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="passno">Passport Number</label>
                <input type="text" id="passno" name="passno" required>
            </div>
            <div class="form-group">
                <label for="pno">Phone Number</label>
                <input type="text" id="pno" name="pno" required>
            </div>
            <div class="form-group">
                <label for="sex">Sex</label>
                <select id="sex" name="sex" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="submit-btn">Register</button>
	</form>

</body>
</html>