<?php
include('header.php');
include('config.php');

$id=$_GET['id'];
$sql= "delete from category where id='$id'";

if(mysqli_query($con,$sql)){
    echo "<script> alert('delete record');
    window.location.href='cat_table.php';</script>";
}else{
    echo "Error:". mysqli_error($con);

}
include('footer.php');
?>