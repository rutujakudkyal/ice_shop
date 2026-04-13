<?php
session_start();
include('header.php');
include('config.php');

//  if(!isset($_SESSION['email'])){
//     header("Location: login.php");
//     exit();
//  }

 $email = $_SESSION['email'];

 $sql= "SELECT * from register where email='$email'";
 $res = mysqli_query($con,$sql);
 $user = mysqli_fetch_assoc($res);

?>

    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">Profile</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Profile</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

         <!-- Profile Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative text-center mb-5">
                        <!-- My Profile -->
                    </h1>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="contact-form bg-light rounded p-5">
                        <div id="success"></div>

<div class="container mt-5">
    <h2 class="text-center mb-4"><i>My Profile</i></h2>

    <table class="table table-bordered table-striped">
        <tr>
            <th>User ID</th>
            <td><?php echo $user['id']; ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo $user['name']; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $user['email']; ?></td>
        </tr>
        <tr>
            <th>Contact</th>
            <td><?php echo $user['contact']; ?></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><?php echo $user['pass']; ?></td>
        </tr>
    </table>

     <div class="text-center"> 
        <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile End -->


<?php
include('footer.php');
?>