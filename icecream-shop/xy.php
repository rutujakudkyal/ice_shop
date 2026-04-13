<?php
$conn = mysqli_connect("localhost", "root", "", "your_db");

// JOIN query
$query = "SELECT products.*, stock.quantity 
          FROM products 
          LEFT JOIN stock 
          ON products.id = stock.product_id";

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)) {
?>
    <div class="product">
        <h3><?php echo $row['name']; ?></h3>
        <p>Price: ₹<?php echo $row['price']; ?></p>

        <?php
        if($row[6] > 0){
            echo "<p style='color:green;'>Available</p>";
        } else {
            echo "<p style='color:red;'>Out of Stock</p>";
        }
        ?>
    </div>
<?php
}
?>
   
/////



<?php
session_start();
include('config.php');
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body { 
         font-family: Arial;
         background:#f5f5f5; 
        }
        .box { 
            width:800px;
            margin:auto; 
            background:white; 
            padding:20px; 
        }
        table { 
            width:100%;
            border-collapse:collapse;
            margin-top:20px; 
        }
        th, td { 
            border:1px solid #ccc;
            padding:10px;
            text-align:center; 
        }
    </style>
</head>
<body>

<h2 align="center">Order History</h2>

<?php
$total = 0;
?>

<table>
<tr>
    <th>Img</th>
    <th>Product</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Total</th>
    <th>Remove</th>
</tr>

<?php
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $subtotal = $item['price'] * $item['quantity'];
        $total += $subtotal;
?>
<tr>
    <th scope="row">
        <div class="d-flex align-items-center mt-2">
            <img src="../Admin/file/<?php echo $item['img']; ?>" 
            style="width: 90px; height: 90px;" alt="">
        </div>
    </th>
    <td><?php echo $item['pname']; ?></td>
    <td>$<?php echo $item['price']; ?></td>
    <td><?php echo $item['quantity']; ?></td>
    <td>$<?php echo $subtotal; ?></td>
    <td>
    <a href="del_page.php?id=<?php echo $item['id']; ?>" style="font-size:20px;">
        ❌
    </a>
</td>
</tr>
<?php
    }
}
?>
</table>
<br>
<a href="index.php">Back To Shop</a>
</div>

</body>
</html>
