<?php
session_start();
include('config.php');

$id = $_POST['id'];
$action = $_POST['action'];

// Loop through cart items
foreach ($_SESSION['cart'] as $key => $item) {

    if ($item['id'] == $id) {

        // Fetch current stock from database
        $res = mysqli_query($con, "SELECT qty FROM stock WHERE id = $id LIMIT 1");
        $row = mysqli_fetch_assoc($res);
        $stock = $row['qty'];

        // Increase quantity
        if ($action == "increase") {
            if ($item['quantity'] < $stock) {
                $_SESSION['cart'][$key]['quantity']++;
            } else {
                // Stock exceeded, show alert and stop
                echo "<script>
                        alert('Only $stock items available');
                        window.location='cart.php';
                      </script>";
                exit();
            }
        }

        // Decrease quantity
        if ($action == "decrease" && $item['quantity'] > 1) {
            $_SESSION['cart'][$key]['quantity']--;
        }
    }
}

header("Location: cart.php");
exit();
?>