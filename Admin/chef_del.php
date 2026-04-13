<?php
include('header.php');
include('config.php');

$id = $_POST['id'];
$sql= "delete from chefs where id ='$id'";

if(mysqli_query($con,$sql)){
    echo "<script> alert('Record delete');
    window.location herf='chef_table';</script>";

}else{
   echo "Error:". mysqli_error($con);
}

include('footer.php');
?>


