<?php
session_start();
$_SESSION["User"] = "";
session_destroy();
header ("Location: login.php");
?>