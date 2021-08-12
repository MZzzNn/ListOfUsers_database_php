<html>
    <head>
    <style>
        div {
            margin: auto;
            text-align: center;
            border: 1 black solid;
        }
        *{
            padding: 5px;
            margin: 10px;
        }
    </style>
    <?php 
     if (isset($_COOKIE['fname'])) {
        setcookie("fname", '');
    }
    ?>
    </head>
    <body>
    <div>
        <h3>LogIn</h3>
        <form action="studentController.php" method="POST">
            <input type="text" name="email" placeholder="Enter email.."> <br>
            <input type="password" name="pass" placeholder="Enter password.."><br>
            <input type="submit" value="Login" name="login">
            <a href="register.php">register</a>
        </form>
    </div>
    </body>
</html>