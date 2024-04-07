<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
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
          h1 {
          	font-size: 20px;
            text-align: center;
            color: black;
        }

        .header {
            text-align: center;
            
            color: #fff;
            padding: 1px;
        }

        .container {
            max-width: 500px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
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

        input[type="text"],
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
	<body>
    <div class="header">
        <h1>Login</h1>
    </div>
    <?php
        if(@$_GET['Empty'] == true) {
    ?>
    <div class="alert-light text-danger"><?php echo $_GET['Empty'] ?></div>
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
        <form action="process.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <button class="btn" name="Login">Login</button>
            <br>
            <br>
            
            <button class="btn" name="Admin">Admin</button>
            <br>
            <a href="SignUp.php?Signup">Signup</a>
        </form>
    </div>

</body>
</html>