<?php

$connection=mysqli_connect('localhost', 'root', '', 'kursevi');

if($connection->connect_error)
    die("Connection error: ".$connection->connect_error);

?>