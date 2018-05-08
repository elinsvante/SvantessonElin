<?php
    
    include_once 'dbh.php';
    include_once 'saveMessage.php';
    
    session_start();
    if(!isset($_SESSION['User'])) 
    {
    header("Location: login.php");
    }

    $sql = "SELECT * FROM Messages;";
    $result = $connection->query($sql);
?>

<html>
<head>
    <title> Commentsss </title>
    <link rel = "stylesheet" href = "assets/css/main.css">
<body>
<div id = "header">
<h2> Welcome <?php echo $_SESSION['User']; ?> </h2>
<p1> You are now logged in </p1>
<br><br>
<a href = logout.php> <input type=submit name=logout value=Logout></a>
</div>
    <div id="wrapper">
        <h1 id="rubrik"> Leave a comment! </h1>
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
    <h2>All comments</h2>
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

