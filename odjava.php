<?php
session_start();
session_unset();

setcookie('notification',"You have been successfully logged out!", time()+1500, "/");
header("Location: index.php");
?>