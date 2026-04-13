<?php
include('header.php');
include('config.php');

if(isset($_POST['store'])){
    $product_id = $_POST['product_id'];
    $qty = $_POST['qty']; 

    $sql= "insert into inward(product_id,qty) values('$product_id','$qty')";
    if(mysqli_query($con,$sql)){

        $check = mysqli_query($con,
        "SELECT * from stock where product_id = '$product_id'");

        if(mysqli_num_rows($check)>0){

            $update = "UPDATE stock SET qty = qty + $qty WHERE product_id = '$product_id'";
            if(!mysqli_query($con, $update)){
                echo "Update Error: " . mysqli_error($con);
            }

        }else{

            $insert = "INSERT into stock (product_id,qty) values('$product_id','$qty')";
            if(!mysqli_query($con, $insert)){
                echo "Insert Error: " . mysqli_error($con);
            }

        }

        echo "<script>alert('Inward added successfully');window.location.href='inward_table.php';</script>";
    }else{
        echo "error: " . mysqli_error($con);
    }
}
?>
<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Basic Form Inputs</h5>
                                            <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Form Components</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Basic Form Inputs</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <!-- Page body start -->
                                    <div class="page-body">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Inward</h5>
                                                        <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                                    </div>
                                                    <div class="card-block">
                                                        <h4 class="sub-title">Inward Inputs</h4>
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">CID</label>

                                                                    <select name="product_id" class="form-control" required>
                                                                         <option>select product</option>
                                                                            <?php 
                                                                            $con = mysqli_connect('localhost', 'root', '', 'iceshop');
                                                                            $sql="select * from product";
                                                                            $res=mysqli_query($con,$sql);
                                                                            while($rw=mysqli_fetch_row($res))
                                                                                {
                                                                                ?>
                                                                             <option value="<?php echo $rw[0]?>"><?php echo $rw[2];?></option>
                                                                                     <?php 
                                                                                      }
                                                                                       ?>
                                                                    </select><br><br>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Qty</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text"  name="qty" class="form-control form-control-round" placeholder="Enter qty" required>
                                                                </div>
                                                            </div>



                                                             <div class="form-group row">
                                                                <div class="col-sm-10">
                                                                <center><button type="submit" value="Store" name="store" class="btn btn-primary">Store</button></center>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- Basic Form Inputs card end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->
                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include('footer.php');
?>