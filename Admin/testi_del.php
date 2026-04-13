<?php
include('header.php');
include('config.php');

$id = $_POST['id'];
$sql = "delete from testimonial where id ='$id'";

if(mysqli_query($con,$sql)){
    echo "<script> alert('record deleted');
    window.location href='testi_table.php';</script>";
}else{
    echo "Error:" . mysqli_error($con);
}
?>

<?php
include('footer.php');
?>

