<?php
include("auth.php");
include("header.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_email = $_SESSION['email'];

/* Join orders + order_items + product */
$sql = "SELECT 
            o.id AS order_id,
            o.order_date,
            p.name AS product_name,
            oi.quantity,
            oi.price,
            oi.subtotal
        FROM orders o
        JOIN order_items oi ON o.id = oi.order_id
        JOIN product p ON oi.product_id = p.id
        WHERE o.email = '$user_email'
        ORDER BY o.order_date DESC";

$result = mysqli_query($con, $sql);
?>

<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">My Orders</h2>

    <?php if(mysqli_num_rows($result) > 0){ ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">
            <thead class="table-danger">
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>

                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>

                <?php while($row = mysqli_fetch_assoc($result)){ ?>

                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td>₹ <?php echo $row['price']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td>₹ <?php echo $row['subtotal']; ?></td>

                    <td><?php echo date("d-m-Y H:i", strtotime($row['order_date'])); ?></td>
                </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>

    <?php } else { ?>

    <div class="alert alert-info text-center">
        No orders found.
    </div>

    <?php } ?>

</div>

<?php include("footer.php"); ?>