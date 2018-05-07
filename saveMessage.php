<?php
include_once 'dbh.php';
$name = $email = $message = "";
$name_error = $email_error = $message_error = "";

    //if leave comment button is clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {

    $Name = mysqli_real_escape_string($connection, $_POST['name']);
    $Email = mysqli_real_escape_string($connection, $_POST['email']);
    $Message = mysqli_real_escape_string($connection, $_POST['message']);

    $name = trim($Name);
    $email = trim($Email);
    $message = trim($Message);

        if (empty($name)) {
        $name_error = "Name is required";
        } 

        if (empty($email)) {
        $email_error = "Email is required";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                $email_error = "Invalid email format"; 
                } 

        if (empty($message)) {
        $message_error = "Message is required";
        } 

        if ($name_error == "" && $email_error == "" && $message_error == "") {
        $insert = "INSERT INTO Messages (Name,Email, Message) VALUES ('".$name."', '".$email."', '".$message."');";
        $connection->query($insert);
      
        $name = $email = $message = "";
        header ("Refresh : 0.1;  URL = index.php" );
        }
    }
?>