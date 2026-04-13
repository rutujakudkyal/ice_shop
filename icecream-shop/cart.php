<?php
session_start();

// Display stock alert if set
// if(isset($_SESSION['error'])){
//     echo "<script>alert('".$_SESSION['error']."');</script>";
//     unset($_SESSION['error']); // remove it after showing
// }

include('header.php');
include('config.php');
?>

<!-- Header Start -->
<div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mt-lg-5">Shopping Cart<img src="../Admin/assets/images/mega-menu/cart.png" width='70px';></h1>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <i class="fa fa-circle px-3"></i>
            <p class="m-0">Shopping cart</p>
        </div>
    </div>
</div>
<!-- Header End -->

        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
            <a href="clear_cart.php" class="btn btn-sm btn-secondary">
                   Clear Cart
            </a><br><br>
            

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Update</th>

                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total= 0;
                            $subtotal=0;
                            if(isset($_SESSION['cart']) && !empty($_SESSION['cart']))
                            {
                          foreach($_SESSION['cart'] as $item){
                          $subtotal=(int)$item['price'] * (int)$item['quantity'];
                           $total+=$subtotal;
                           ?>

                            
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src= "../Admin/file/<?php echo $item['img'];?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4"><?php echo $item['pname'];?></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4"><?php echo $item['price'];?></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4"><?php echo $item['quantity'];?></p>
                                </td>

                                <!-- <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>-->
                                <!-- <td>
                                    <p class="mb-0 mt-4">2.99 $</p>
                                </td>-->
                                <!-- <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4" >
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>-->
                                <td>
                                    <p class="mb-0 mt-4"><?php echo $subtotal ?></p>
                                </td>

                                <td>
                                <div class="d-flex align-items-center mt-3">
                                     <form method="post" action="update_qty.php" class="d-flex align-items-center">

                                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">

                                          <!-- Minus -->
                                        <button type="submit" name="action" value="decrease" class="btn btn-sm btn-outline-secondary">
                                              −
                                        </button>

                                <br>
                                          <!-- Plus -->
                                        <button type="submit" name="action" value="increase" class="btn btn-sm btn-outline-secondary">
                                             +
                                        </button>

                                   </form>

                                 
                                </div>
                            </td>

                                <td>
                                  <a href="delete.php?id=<?php echo $item['id']; ?>" style="font-size:20px;"><i class="fa fa-trash"></i></a>
                               </td>

                            </tr>
                           <?php
                            }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
<br><br>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0">$<?php echo $total;?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Shipping</h5>
                                    <div class="">
                                        <p class="mb-0">Flat rate: $3.00</p>
                                    </div>
                                </div>
                                <p class="mb-0 text-end">Shipping to Ukraine.</p>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p class="mb-0 pe-4">$<?php echo $total+ 3.00 ?></p>
                            </div>
                        <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button"><a href="checkout.php?id=<?php echo $item['id']; ?>">
                         Proceed Checkout</a></button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->


<?php
include('footer.php');
?>