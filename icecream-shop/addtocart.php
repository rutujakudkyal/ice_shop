<?php
session_start();

if(!isset($_SESSION['email'])){
    echo "<script>alert('Login first'); window.location.href='login.php';</script>";
    exit();
}

if(isset($_POST['id'])) {

    $id = $_POST['id'];
    $name = $_POST['pname'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $qty = $_POST['quantity'];

    // Create cart if not exists
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }

    // Check if product already in cart
    $product_exists = false;
    foreach($_SESSION['cart'] as $item){
        if($item['id'] == $id){
            $product_exists = true;
            break;
        }
    }

    if($product_exists){
        echo "<script>
                alert('Product already in cart');
                window.location.href='cart.php';
              </script>";
        exit();
    }

    // Create product array
    $product = [
        "id" => $id,
        "pname" => $name,
        "price" => $price,
        "img" => $img,
        "quantity" => $qty
    ];

    // ADD product to cart
    $_SESSION['cart'][] = $product; 

                if(isset($_SESSION['wishlist'])){
                $key = array_search($product_id, $_SESSION['wishlist']);
                if($key !== false){
                    unset($_SESSION['wishlist'][$key]);
                    $_SESSION['wishlist'] = array_values($_SESSION['wishlist']);
            

                }
            }


    // Redirect
    header("Location: cart.php");
    exit();
}
?>