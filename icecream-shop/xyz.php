<?php
session_start(); 
$id = $_GET['id'];

if(isset($_POST['id'])){

    $product_id = $_POST['id'];
    $pname = $_POST['pname'];
    $desction = $_POST['desction'];
    $price = $_POST['price'];
    $qty = $_POST['quantity'];
    $product_img = $_POST['img'];

    $product = [
        'id' => $product_id,
        'pname' => $pname,
        'desction' => $desction,
        'price' => $price,
        'quantity' => $qty,
        'img' => $product_img
    ];

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    } 
    else{
        if(isset($_SESSION['cart'])){
            $product_id = $_SESSION['id'];
            $pname = $_SESSION['pname'];
            $desction = $_SESSION['desction'];
            $price = $_SESSION['price'];
            $qty = $_SESSION['quantity'];
            $img = $_SESSION['img'];
            print_r($_SESSION['cart']);
        }
        else{
            echo "cart is empty";
        }
    }

    $_SESSION['cart'][] = $product; // moved here (after if-else)

}
?>