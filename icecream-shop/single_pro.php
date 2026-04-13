<?php
include('header.php');
include('config.php');
$id = $_GET['id'];
?>


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">Single page</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Single page</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <h1 class="section-title position-relative text-center mb-5"><i>Delightful Ice Cream Treats – Smooth, Sweet & Satisfying</i></h1>
                </div>
            </div>
            <div class="row">
                <?php
                // $sql= "select * from product where id=$id";
                // $res= mysqli_query($con,$sql);
               $sql2=" SELECT * FROM product 
                        INNER JOIN stock ON product.id = stock.product_id 
                        WHERE stock.product_id='$id'";
               $res1= mysqli_query($con,$sql2);

                while($row=mysqli_fetch_row($res1))
                    {
                    ?>

                <!-- <div class="col-lg-4 py-5">
                    <h4 class="font-weight-bold mb-3">About Us</h4>
                    <h5 class="text-muted mb-3">Eos kasd eos dolor vero vero, lorem stet diam rebum. Ipsum amet sed vero dolor sea</h5>
                    <p>Takimata sed vero vero no sit sed, justo clita duo no duo amet et, nonumy kasd sed dolor eos diam lorem eirmod. Amet sit amet amet no. Est nonumy sed labore eirmod sit magna. Erat at est justo sit ut. Labor diam sed ipsum et eirmod</p>
                    <a href="" class="btn btn-secondary mt-2">Learn More</a>
                </div>-->
                <div class="col-lg-4" style="min-height: 400px;">
                    <div class="position-relative h-100 rounded overflow-hidden">
                        <img class="position-absolute w-100 h-100" src= "../Admin/file/<?php echo $row[5];?>" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4 py-5">
                    <h4 class="font-weight-bold mb-3"><?php echo $row[2];?></h4>
                    <p><?php echo $row[3];?></p>
                        <!-- <a href="" class="btn btn-sm btn-secondary">Order Now</a> -->
                            <form action="addtocart.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row[0];?>">
                                <input type="hidden" name="pname" value="<?php echo $row[2];?>">
                                <input type="hidden" name="desction" value="<?php echo $row[3];?>">
                                <input type="hidden" name="price" value="<?php echo $row[4];?>">
                                <input type="hidden" name="img" value="<?php echo $row[5];?>">

                                    <?php if($row[8] > 0){ ?>
                                    <input type="number" name="quantity" value="1" min="1" max="<?php echo $row[8]; ?>" 
                                           style="width:80px;" class="form-control">
                                    <?php } else { ?>
                                        <p style="color:red;">Not available</p>
                                    <?php } ?><br>


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
                <?php
                    }
                    ?>
            </div>
        </div>
    </div>
    <!-- About End -->




<?php
include('footer.php');
?>