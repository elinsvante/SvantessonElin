<?php

include_once 'dbh.php';

$name = $email = $password = "";
$name_error = $email_error = $password_error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {

    $Email = mysqli_real_escape_string($connection, $_POST['email']);
    $Password = mysqli_real_escape_string($connection, $_POST['password']);

    //check if the user exists
    $sql = "SELECT * FROM Users WHERE Email = '$Email'";
    $result = $connection->query($sql);
    $resultCheck = mysqli_num_rows($result);

    $email = trim($Email);
    $password = trim($Password);

        if (empty($email)) {
        $email_error = "Email is required";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                $email_error = "Invalid email format"; 
                } 

        if (empty($password)) {
        $password_error = "Password is required";
        } 

        if ($email_error == "" && $password_error == "") 
        {
            //check if the user exists
              if ($resultCheck == 0)
            {
                $email_error = "User doesn't existst";
            }

            else 
            {
                                     
            $saltFromDatabase = "SELECT Salt FROM Users WHERE Email = '$Email'";
            $result = $connection->query($saltFromDatabase); 

            $row = mysqli_fetch_array($result);

            $Salt = $row[1];

            $hash = sha1($Salt . $Password);       

            $sql = "SELECT Password FROM Users WHERE Email = '$Email'";
            $data = $connection->query($sql);

                if($hash == $data)
                {
                    session_start(); 
                    $_SESSION['UserID'] = $data;
                    $name = $email = $password = "";
                    header ("Refresh : 0.1;  URL = index.php");
                }
                else 
                {
                    $password_error = "Wrong password!";
                }

            }
                          
            }
        
    }
?>