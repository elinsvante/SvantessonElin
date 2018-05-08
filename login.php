<?php
    include_once 'dbh.php';
    include_once 'checkLogIn.php';
?>

<html>
<head>
    <title> LogIn </title>
    <link rel = "stylesheet" href = "assets/css/main.css">
<body>
    <div id="wrapper">
        <h1> Please log in below. </h1> 
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                Email:<br>
                <input type="text" name="email" id="email" value = "<?php echo $email;?>"> <br>
                <p1> <?php echo $email_error; ?> </p1><br>

                Password:<br>
                <input type = "text" name="password" id ="password" value = "<?php echo $password;?>"><br>
                <p1> <?php echo $password_error; ?> </p1><br>

                <br>

                <input type="submit" name="submit" id="submit" value="Log in">
        </form>

<a href = 'register.php'><p1> Not registred? </p1> </a>
    </div>
</body>
</head>
</html>