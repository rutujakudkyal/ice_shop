  <?php
  include('header.php');
  include('config.php');


if(isset($_POST['place_order'])){
    

    if(!empty($_SESSION['cart'])){
       $fname = $_POST['fname'];
       $lname = $_POST['lname'];
       $address = $_POST['address'];
       $city = $_POST['city'];
       $country = $_POST['country'];
       $pincode = $_POST['pincode'];
       $mobile = $_POST['mobileno'];
       $email = $_POST['email'];
       $note = $_POST['note'];

       $sql="INSERT into bill_detail(fname,lname,address,city,country,pincode,mobileno,email,note) values('$fname','$lname','$address','$city','$country','$pincode','$mobile','$email','$note')";

       if(mysqli_query($con,$sql)){

         $bill_id = mysqli_insert_id($con);

         foreach($_SESSION['cart'] as $item){

            $product_id = $item['id'];
            $product_name = $item['pname'];
            $price = $item['price'];
            $quantity = $item['quantity'];
            $item_total = $price * $quantity;

            $sql2 = "INSERT into order_detail(bill_id,product_id,product_name,price,quantity,total) values('$bill_id','$product_id','$product_name','$price','$quantity','$item_total')";
            mysqli_query($con,$sql2);

         }
         include('send_mail.php'); 
         
         unset($_SESSION['cart']);
         echo "<script>alert('Order Placed Successfully');
                     window.location='receipt.php?bill_id=".$bill_id."';

        </script>";

       }else{
        die(mysqli_error($con));
       }
    }else{
       echo "<script> alert('Cart is Empty');</script>";

    }
  }
   
  $session_email = $_SESSION['email'];
  $query = "SELECT name, email, contact from register where email='$session_email'";
  $res = mysqli_query($con,$query);
  $user = mysqli_fetch_assoc($res);

  ?>

      <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">Checkout</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

  <!-- Checkout Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">Billing details</h1>
                <form method="POST" action="">
                    <div class="row g-5">
                        <div class="col-md-12 col-lg-6 col-xl-7">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">First Name<sup>*</sup></label>
                                        <input type="text" name="fname" class="form-control" value="<?php echo $user['name']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Last Name<sup>*</sup></label>
                                        <input type="text" name="lname" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-item">
                                <label class="form-label my-3">Company Name<sup>*</sup></label>
                                <input type="text" class="form-control">
                            </div> -->
                            <div class="form-item">
                                <label class="form-label my-3">Address <sup>*</sup></label>
                                <input type="text" name="address" class="form-control" placeholder="House Number Street Name" required>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Town/City<sup>*</sup></label>
                                <input type="text" name="city" class="form-control" required>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Country<sup>*</sup></label>
                                <input type="text" name="country" class="form-control" required>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                                <input type="text" name="pincode" class="form-control" required>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Mobile<sup>*</sup></label>
                                <input type="tel" name="mobileno" class="form-control" value="<?php echo $user['contact']; ?>" required>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Email Address<sup>*</sup></label>
                                <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" required>
                            </div>
                            <!-- <div class="form-check my-3">
                                <input type="checkbox" class="form-check-input" id="Account-1" name="Accounts" value="Accounts">
                                <label class="form-check-label" for="Account-1">Create an account?</label>
                            </div>
                            <hr>
                            <div class="form-check my-3">
                                <input class="form-check-input" type="checkbox" id="Address-1" name="Address" value="Address">
                                <label class="form-check-label" for="Address-1">Ship to a different address?</label>
                            </div> -->
                            <br>
                            <div class="form-item">
                                <label class="form-label my-3">Note<sup>*</sup></label>
                               <textarea name="note" class="form-control" cols="30" rows="11" placeholder="Order Notes (Optional)" required></textarea>
                            </div>
                        </div>

                        <!-- Right side info -->
                        <div class="col-md-12 col-lg-6 col-xl-5">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Products</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $total = 0;


                                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $item) {
                                            $subtotal = $item['price'] * $item['quantity'];
                                            $total += $subtotal;
                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center mt-2">
                                                <img src="../Admin/file/<?php echo $item['img']; ?>" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                            </div>
                                        </th>
                                        <td class="py-5"><?php echo $item['pname']; ?></td>
                                        <td class="py-5">$<?php echo $item['price']; ?></td>
                                        <td class="py-5"><?php echo $item['quantity']; ?></td>
                                        <td class="py-5">$<?php echo $subtotal; ?></td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    ?>

                                    <tr>
                                        <th scope="row"></th>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark py-3">Subtotal</p>
                                        </td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">$<?php echo $total; ?></p>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- <tr>
                                        <th scope="row"></th>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark py-4">Shipping</p>
                                        </td>
                                        <td colspan="3" class="py-5">
                                            <div class="form-check text-start">
                                                <input type="radio" class="form-check-input bg-primary border-0" id="Shipping-1" name="Shipping" value="Free Shipping" <?php if($selected_shipping=="Free Shipping") echo "checked"; ?>>
                                                <label class="form-check-label" for="Shipping-1">Free Shipping</label>
                                            </div>
                                            <div class="form-check text-start">
                                                <input type="radio" class="form-check-input bg-primary border-0" id="Shipping-2" name="Shipping" value="Flat rate" <?php if($selected_shipping=="Flat rate") echo "checked"; ?>>
                                                <label class="form-check-label" for="Shipping-2">Flat rate: $15.00</label>
                                            </div>
                                            <div class="form-check text-start">
                                                <input type="radio" class="form-check-input bg-primary border-0" id="Shipping-3" name="Shipping" value="Local Pickup" <?php if($selected_shipping=="Local Pickup") echo "checked"; ?>>
                                                <label class="form-check-label" for="Shipping-3">Local Pickup: $8.00</label>
                                            </div>
                                        </td>
                                    </tr> -->

                                    <tr>
                                        <th scope="row"></th>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                        </td>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">$<?php echo $total+3.00 ?></p>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="checkbox" class="form-check-input bg-primary border-0" id="Transfer-1" name="Transfer" value="Transfer">
                                        <label class="form-check-label" for="Transfer-1">Direct Bank Transfer</label>
                                    </div>
                                    <p class="text-start text-dark">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                </div>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="checkbox" class="form-check-input bg-primary border-0" id="Payments-1" name="Payments" value="Payments">
                                        <label class="form-check-label" for="Payments-1">Check Payments</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1" name="Delivery" value="Delivery">
                                        <label class="form-check-label" for="Delivery-1">Cash On Delivery</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="checkbox" class="form-check-input bg-primary border-0" id="Paypal-1" name="Paypal" value="Paypal">
                                        <label class="form-check-label" for="Paypal-1">Paypal</label>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                 <!-- <button type="button" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place Order</button> -->
                                  <button type="submit" name="place_order" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place Order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Checkout Page End -->

<?php
include('footer.php');
?>