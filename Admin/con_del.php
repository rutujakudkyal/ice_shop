<?php
include('header.php');
include('config.php');

$id = $_GET['id'];
$sql= "delete from contact where id= '$id'"; 

if(mysqli_query($con,$sql)){
    echo "<script> alert('deleted successfully');
    window.location herf='cont_table.php';</script>";

}else{
    echo "Error:" . mysqli_error($con);
}

include('footer.php');

?>
