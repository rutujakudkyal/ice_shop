<?php
include('header.php');
include('config.php');

 if(!isset($_GET['id'])|| empty($_GET['id'])){
   die("Invalid category ID");
 }
  $id = $_GET['id'];

 $sql = "SELECT * from category where id = $id";
 $res = mysqli_query($con,$sql);
 $row = mysqli_fetch_assoc($res);

 if (isset($_POST['store'])){
    $cname = $_POST['cname'];

    if(!empty($_FILES['img']['name'])){

        $image_name = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $upload_file = "file/". $image_name;

        move_uploaded_file($tmp_name, $upload_file);
        if(!empty($row['img']) && file_exists("file/".$row['img'])){
            unlink("file/". $row['img']);
        }
    }else{
        $image_name = $row['img'];
    }

    $sql1 = "UPDATE category set cname = '$cname', img = '$image_name' where id = $id";

    if(mysqli_query($con,$sql1)){
        echo "<script> alert('record updated');
        window.location ='cat_table.php';
        </script>";

    }else{
        echo "Error:" . mysqli_error($con);
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
                                                        <h5>Category</h5>
                                                        <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                                    </div>
                                                    <div class="card-block">
                                                        <h4 class="sub-title">Category Update</h4>
                                                        <form method="post" enctype="multipart/form-data">

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text"  name="cname" class="form-control form-control-round" value="<?php echo $row['cname'];?>" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Current Image</label>
                                                                <div class="col-sm-10">
                                                                    <img src="file/<?php echo $row['img'];?>" width="80"> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Change Image</label>
                                                                <div class="col-sm-10">
                                                                    <input type="file" name="img" class="form-control form-control-round" required>
                                                                </div>
                                                            </div>
                                                             <!-- <div class="form-group row"> -->
                                                                <div class="col-sm-10">
                                                                <center><button type="submit" value="update" name="store" class="btn btn-primary">Update</button></center>
                                                                </div>
                                                            <!-- </div>
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