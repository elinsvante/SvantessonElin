<?php
    include_once 'dbh.php';
    include_once 'saveMessage.php';

    $sql = "SELECT * FROM Messages;";
    $result = $connection->query($sql);
?>

<html>
<head>
    <title> Comments </title>
    <link rel = "stylesheet" href = "assets/css/main.css">
<body>
    <div id="wrapper">
        <h1 id="rubrik"> Thank you for your comments! </h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="myForm" onsubmit="return validateForm()" method="POST">

                Name:<br>
                <input type="text" name="name" id="name" value = "<?php echo $name;?>"> <br>
                <p1> <?php echo $name_error; ?> </p1><br>


                E-mail:<br>
                <input type="text" name="email" id="email" value="<?php echo $email;?>"> <br>
                <p1> <?php echo $email_error; ?> </p1><br>


                Message:<br>
                <textarea type = "text" name="message" id ="message" rows="5" cols="40"><?php echo $message;?></textarea> <br>
                <p1> <?php echo $message_error; ?> </p1><br>
                <br>

                <input type="submit" name="submit" id="submit" value="Leave your comment">
        </form>

    <hr>
    <h2>Read all comments below.</h2>
    <hr>
    <div id = "wrapper2">
    <?php
        while ($row = $result->fetch_assoc())
        {
            echo "<h3>".$row ['Name']. "</h3>";
            echo "<p>" .$row ['Message']. "</p>";
        }
    ?>
    </div>


</body>
</head>
</html>

