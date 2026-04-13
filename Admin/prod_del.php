<?php
include('header.php');
include('config.php');

$id= $_POST['id'];
$sql="delete from product where id='$id' ";

if(mysqli_query($con,$sql)){
    echo "<script> alert('record delete');
    window.location.href='prod_table.php';<script>";

}else{
    echo "Error:". mysqli_error($con);

}
?>

<?php
include('footer.php');
?>