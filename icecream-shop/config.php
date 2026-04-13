<?php
$con = mysqli_connect('localhost','root','','iceshop');

if(!$con){
    die("Database connection failed: " . mysqli_connect_error());
}
?>
