<?php
session_start();
$id = $_GET['id'];

foreach($_SESSION['cart'] as $key => $item){
    if($item['id'] == $id){
        unset($_SESSION['cart'][$key]);
    }
}

//  redirect correctly
echo "<script>
        alert('Product removed from cart');
        window.location.href='cart.php';
      </script>";
?>