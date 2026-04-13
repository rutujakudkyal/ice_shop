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
                                            <p class="m-b-0"> Contact Table Display</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Icecream shop Tables</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Contact Table</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">

                        <div style="text-align:right;">
                        <a href="contact.php">
                        <button type="button" style="background-color:blue; width:100px; padding:10px; color:white;"> ADD </button>
                        </a>
                        </div>

                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- Background Utilities table start -->
                                         <div class="card">
                                            <div class="card-header">
                                                <h5>Contact Table</h5>
                                                <!-- <span>Regular table background variants are not available with the inverse table, however, you may use <code>text or background utilities</code> to achieve similar styles.</span> -->
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
                                                    <table class="table table-inverse">

                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Message</th>
                                                                <th colspan='1'>Operation</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                             <?php
                                                          if(isset($_GET['search']) && $_GET['search'] != "")
                                                             {

                                                            $search = $_GET['search'];

                                                             $sql= "select * from contact
                                                                  WHERE name LIKE '%$search%' 
                                                                  OR email LIKE '%$search%'";
                                                               }else{

                                                                  $sql="select * from contact";
                                                               }
                                                             $res=mysqli_query($con,$sql);
                                                             while($rs=mysqli_fetch_row($res))
                                                                 {
                                                                 ?>

                                                        
                                                            <tr class="table-success">
                                                                <td><?php echo $rs[0];?></td>
                                                                <td><?php echo $rs[1];?></td>
                                                                <td><?php echo $rs[2];?></td>
                                                                <td><?php echo $rs[3];?></td>
                                                                <td><a href="cont_del.php?id=<?php echo $rs[0];?>" style="color:#FB5959;">Delete</a></td>

                                                            </tr>

                                                             <?php
                                                             }
                                                             ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Background Utilities table end -->
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