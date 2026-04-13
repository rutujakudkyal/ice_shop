<?php
session_start();


include('header.php');
include('config.php');

$id=$_GET['id'];
?>
    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">Product</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Product</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative text-center mb-5">Best Prices We Offer For Ice Cream Lovers</h1>
                </div>
            </div>
            <div class="row">
                    <?php

                    //  $sql = "SELECT * from product where cid=$id";
                    //  $res = mysqli_query($con, $sql);

                    $sql2 = "SELECT product.*, stock.*, category.*
                    FROM product
                    INNER JOIN stock ON product.id = stock.product_id
                    INNER JOIN category ON product.cid = category.id
                    WHERE product.cid = '$id'";
                    $res1 = mysqli_query($con, $sql2);
                        

                    while ($row = mysqli_fetch_row($res1)) {
                    ?>
                
                <div class="col-lg-3 col-md-6 mb-4 pb-2">
                    <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                        <div class="bg-primary mt-n5 py-3" style="width: 80px;">
                            <h4 class="font-weight-bold text-white mb-0">$<?php echo $row[4];?></h4>
                        </div>
                        <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 150px; height: 150px;">
                            <img class="rounded-circle w-100 h-100" src="../Admin/file/<?php echo $row[5];?>" style="object-fit: cover;">
                        </div>
                        <h4 class="font-weight-bold mb-4">
                                <a href="single_pro.php?id=<?php echo $row[0]; ?>">
                                    <?php echo $row[2]; ?>
                                </a>
                        </h4>

                        <i class="font-weight-bold mb-4"><?php echo $row[3];?></i>

                            <form action="addtocart.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row[0];?>">
                                <input type="hidden" name="pname" value="<?php echo $row[2];?>">
                                <input type="hidden" name="desction" value="<?php echo $row[3];?>">
                                <input type="hidden" name="price" value="<?php echo $row[4];?>">
                                <input type="hidden" name="img" value="<?php echo $row[5];?>">


                                <?php if($row[8] > 0){ ?>
                                <input type="number" name="quantity" value="1" min="1" max="<?php echo $row[8];?>"
                                    style="width:80px;" class="form-control"><br>

                                  <?php } else{ ?>
                                  <p style="color:red;">Not available</p>
                                  <?php } ?>

                                    <a href="heart.php?id=<?php echo $row[0]; ?>" class="btn btn-light border heart p-2">
                                        <i class="bi bi-heart text-danger fs-5"></i>
                                    </a>
                                    
                                <?php if($row[8] == 0){ ?>
                                    <button type="button" class="btn btn-danger" disabled>Out of Stock</button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-sm btn-secondary">
                                        Order Now
                                    </button>
                                <?php } ?>
                                <br><br>

                            </form>

                    </div>
                </div>

                 <?php
                 }
                 ?>
                <div class="col-12 text-center">
                    <a href="" class="btn btn-primary py-3 px-5">Load More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


<?php
include('footer.php');
?>