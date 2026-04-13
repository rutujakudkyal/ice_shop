<?php
include('header.php');
include('config.php');
?>
<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Icecream Shop Tables</h5>
                                            <p class="m-b-0"> Inward Table Display</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!"> Icecream shop Tables</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Inward Table</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">

                        <div style="text-align:right;">
                        <a href="inward.php">
                        <button type="button" style="background-color:blue; width:100px; padding:10px; color:white;"> ADD </button>
                        </a>
                        </div>

                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- Inverse table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Inward Table</h5>
                                                <!-- <span>use class <code>table-dark</code> inside table element</span> -->
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                        <li><i class="fa fa-trash close-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">

                                                <form method="GET" action="">
                                                <input type="text" name="search" placeholder="Search here...">
                                                <button type="submit">Search</button>
                                            </form><br>

                                                    <table class="table table-dark">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Product_Id</th>
                                                                <th>QTY</th>
                                                                <th>Date</th>
                                                                <th colspan='1'><center>Operation</center></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if(isset($_GET['search']) && $_GET['search'] != "")
                                                             {

                                                            $search = $_GET['search'];

                                                             $sql= "select * from inward
                                                                  WHERE product_id LIKE '%$search%' 
                                                                  OR qty LIKE '%$search%'";
                                                               }else{

                                                             $sql="select * from inward";
                                                               }
                                                            $res=mysqli_query($con,$sql);
                                                            while($result=mysqli_fetch_row($res))
                                                                {
                                                                ?>
                                                            
                                                            <tr>
                                                                <!-- <th scope="row">1</th> -->
                                                                <td><?php echo $result[0];?></td>
                                                                <td><?php echo $result[1];?></td>
                                                                <td><?php echo $result[2];?></td>
                                                                <td><?php echo $result[3];?></td>


                                                                <td>
                                                                 <a href="inward_update.php?id=<?php echo $result[0]; ?>" 
                                                                    style="color:#BAF905;">
                                                                    Update</a>
                                                                </td>                                                              
                                                                <td><a href="inward_del.php?id=<?php echo $result[0]; ?>" style="color:#FB5959;"> Delete</a></td>

                                                            </tr>
                                                            <?php
                                                              }
                                                             ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Inverse table card end -->
                                    </div>
                                    <!-- Page-body end -->
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