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
                                            <p class="m-b-0">Product Table Display</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Icecream shop Tables</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Product Table</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->


                        <div class="pcoded-inner-content">

                        <div style="text-align:right;">
                        <a href="product.php">
                        <button type="button" style="background-color:blue; width:100px; padding:10px; color:white;"> ADD </button>
                        </a>
                        </div>

                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- Contextual classes table starts -->
                                         <div class="card">
                                            <div class="card-header">
                                                <h5> Product Table</h5>
                                                <!-- <span>For Make row Contextual add Contextual class like <code>.table-success</code> in <code> tr tag</code> and For cell add Contextual class in <code> td or th tag</code> . </span> -->
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

                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>CID</th>
                                                                <th>PName</th>
                                                                <th>Description</th>
                                                                <th>Price</th>
                                                                <th>Img</th>
                                                                <th colspan='2'><center>Operation</center></th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                          if(isset($_GET['search']) && $_GET['search'] != "") {

                                                            $search = $_GET['search'];

                                                             $sql= "select * from product
                                                                  WHERE pname LIKE '%$search%' 
                                                                OR desction LIKE '%$search%'";
                                                               }else{
                                                                $sql="select * from product";
                                                            }
                                                            $res=mysqli_query($con,$sql);
                                                            while($result=mysqli_fetch_row($res))
                                                                {
                                                                 ?>

                                                              <tr class="table-active">
                                                                <td><?php echo $result[0];?></td>
                                                                <td><?php echo $result[1];?></td>
                                                                <td><?php echo $result[2];?></td>
                                                                <td><?php echo $result[3];?></td>
                                                                <td><?php echo $result[4];?></td>
                                                                <td><?php echo "<img src='file/".$result[5]."' height='50px' width='50px'>"; ?></td>

                                                                <td><a href="prod_update.php?id=<?php echo $result[0]; ?>">Update</a></td>
                                                                <td><a href="pro_del.php?id=<?php echo $result[0]; ?>"> Delete</a></td>

                                                            </tr>
                                                            <?php
                                                                }
                                                                ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Contextual classes table ends -->
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