<?php
session_start();
include('header.php');

include('config.php');

  $email = $_SESSION['email'];

// $query = "SELECT 
//             b.fname, b.lname, b.address, b.city, b.country,
//             b.mobileno, b.pincode, b.email,
//             o.order_id, o.product_name, o.price, o.quantity, o.total
//           FROM bill_detail b
//           JOIN order_detail o 
//           ON b.bid = o.bill_id
//            WHERE b.email = '$email'

//           ORDER BY o.order_id DESC";

                $query="SELECT b.*, o.*,p.*
                FROM bill_detail b
                JOIN order_detail o ON b.bid = o.bill_id
                JOIN product p ON b.bid = p.id

                WHERE b.email = '$email'
                ORDER BY o.order_id DESC";

$result = mysqli_query($con, $query);
?>
<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4"><i>My Orders</i></h2>


<table border="2" cellpadding="30">
    <tr>
        <th>Order ID</th>
        <th>Person Name</th>
        <th>Product</th>
        <th>Img</th>

        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
        <!-- <th>City</th> -->
        <!-- <th>Mobile</th> -->
        <!-- <th>Date</th> -->
    </tr>

<?php
while($row = mysqli_fetch_assoc($result)) {
?>
    <tr>
        <td><?php echo $row['order_id']; ?></td>
        <td><?php echo $row['fname']." ".$row['lname']; ?></td>
        <td><?php echo $row['product_name']; ?></td>
    <td><img src="../Admin/file/<?php echo $row['img']; ?>" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt=""></td>

        <td>$<?php echo $row['price']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td><?php echo $row['total']; ?></td>
       </td>

        <!-- <td><?php echo $row['city']; ?></td> -->
        <!-- <td><?php echo $row['mobileno']; ?></td> -->
        <!-- <td><?php echo date("d/m/Y"); ?></td> -->

    </tr>
<?php
}
?>
</table>
<?php
include('footer.php');
?>