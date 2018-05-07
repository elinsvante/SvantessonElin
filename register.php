<?php
    include_once 'dbh.php';
    include_once 'saveUser.php';

?>

<html>
<head>
    <title> Registration </title>
    <link rel = "stylesheet" href = "assets/css/main.css">
<body>
    <div id="wrapper">
        <h1> Registration </h1> 
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                Name:<br>
                <input type="text" name="name" id="name" value = "<?php echo $name;?>"> <br>
                <p1> <?php echo $name_error; ?> </p1><br>


                Email:<br>
                <input type="text" name="email" id="email" value = "<?php echo $email;?>"> <br>
                <p1> <?php echo $email_error; ?> </p1><br>

                Password:<br>
                <input type = "text" name="password" id ="password" value = "<?php echo $password;?>"><br>
                <p1> <?php echo $password_error; ?> </p1><br>

                <br>

                <input type="submit" name="submit" id="submit" value="Register">
        </form>


</body>
</head>
</html>