<?php
include_once 'dbh.php';

//returns a unique random salt-string
function unique_salt() {
 
    return substr(sha1(mt_rand()),0,22);
}


$name = $email = $password = "";
$name_error = $email_error = $password_error = "";

//if the register button is clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {

    $Name = mysqli_real_escape_string($connection, $_POST['name']);
    $Email = mysqli_real_escape_string($connection, $_POST['email']);
    $Password = mysqli_real_escape_string($connection, $_POST['password']);

    $sql = "SELECT * FROM Users WHERE Email = '$Email'";
    $result = $connection->query($sql);
    $resultCheck = mysqli_num_rows($result);

    $name = trim($Name);
    $email = trim($Email);
    $password = trim($Password);

        if (empty($name)) {
        $name_error = "Name is required";
        } 

        if (empty($email)) {
        $email_error = "Email is required";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                $email_error = "Invalid email format"; 
                } 

        if (empty($password)) {
        $password_error = "Password is required";
        } 

        else if ($name_error == "" && $email_error == "" && $password_error == "") 
        {
            //check if there is already an existing user
            if ($resultCheck > 0)
            {
                $email_error = "User already existst";
            }
            else {
            $unique_salt = unique_salt();
            $hash = sha1($unique_salt . $Password);

            $insert = "INSERT INTO Users (Salt,Email,Password,Name) VALUES ('".$unique_salt."', '".$email."', '".$hash."', '".$name."');";
            $connection->query($insert);

            $name = $email = $password = "";

            header ("Location: registrationDone.php" );

            }
            
       
        }
    }
?>