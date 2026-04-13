<?php
include('header.php');
include('config.php');

if(!$con){
  die("database connection failed: " . mysqli_connect_error());
}

if(isset($_POST['store']))
{

$cid = $_POST['cid'];
$pname = $_POST['pname'];
$desction = $_POST['desction'];
$price = $_POST['price'];

$image_name = $_FILES['img']['name'];
$image_tmp = $_FILES['img']['tmp_name'];

if(!empty($image_name)){

  move_uploaded_file($image_tmp, "file/"  . $image_name);

}else{
    $image_name = "";
}

$sql = "INSERT INTO product (cid, pname, desction, price, img) VALUES('$cid', '$pname','$desction','$price','$image_name')";

if(mysqli_query($con,$sql)){

    echo "<script>alert('Record Inserted');</script>";

}else{

    echo "Error: " . mysqli_error($con);

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
                                                        <h5>Product</h5>
                                                        <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                                    </div>
                                                    <div class="card-block">
                                                        <h4 class="sub-title">Product Inputs</h4>
                                                        <form method="post" enctype="multipart/form-data">


                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">CID</label>

                                                                    <select name="cid" class="form-control" required>
                                                                         <option>select Category Name</option>
                                                                            <?php 
                                                                            $con = mysqli_connect('localhost', 'root', '', 'iceshop');
                                                                            $sql="select * from category";
                                                                            $res=mysqli_query($con,$sql);
                                                                            while($rw=mysqli_fetch_row($res))
                                                                                {
                                                                                ?>
                                                                             <option value="<?php echo $rw[0]?>"><?php echo $rw[1];?></option>
                                                                                     <?php 
                                                                                      }
                                                                                       ?>
                                                                               </select><br><br>
                                                                        </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text"  name="pname" class="form-control form-control-round" placeholder="Enter product name" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Description</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="desction" class="form-control form-control-round" placeholder="Enter description" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Price</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="price" class="form-control form-control-round" placeholder="Enter Price" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Image</label>
                                                                <div class="col-sm-10">
                                                                    <input type="file" name="img" class="form-control form-control-round" placeholder="choice img" required>
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