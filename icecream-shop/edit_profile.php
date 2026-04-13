<?php
include('header.php');
include('config.php');
// Make sure session is started at the top
 if(!isset($_SESSION['email'])){
     header("Location: login.php");
     exit();
 }

$email = $_SESSION['email'];

$sql = "SELECT name, email, contact, pass FROM register WHERE email='$email'";
$res = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($res);

if(isset($_POST['store'])){

    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    if($user['pass'] != $current_pass){
        echo "<script>alert('Current password is incorrect');</script>";
    }
    elseif($new_pass != $confirm_pass){
        echo "<script>alert('New password & Confirm password not match');</script>";
    } else {
        $update = "UPDATE register SET pass='$new_pass' WHERE email='$email'";

        if(mysqli_query($con, $update)){
            echo "<script>
                    alert('Password updated successfully');
                    window.location.href='profile.php';
                  </script>";
        } else {
            echo "<script>alert('Password update failed');</script>";
        }
    }

}
?>

    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">Edit Profile</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Edit Profile</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

         <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative text-center mb-5">
                        Edit Profile
                    </h1>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="contact-form bg-light rounded p-5">
                        <div id="success"></div>

                        <form method="post">
                            <div class="form-row">

                                <div class="col-sm-6 control-group">
                                    <input type="text" class="form-control p-4"
                                        name="name" placeholder="Your Name" value="<?php echo $user['name']; ?>"
                                        required>
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="col-sm-6 control-group">
                                    <input type="email" class="form-control p-4"
                                        name="email" placeholder="Your Email" value="<?php echo $user['email']; ?>"
                                        required>
                                    <p class="help-block text-danger"></p>
                                </div>

                            </div>

                            <div class="control-group">
                                <input type="text" class="form-control p-4"
                                    name="subject" placeholder="Contact" value="<?php echo $user['contact']; ?>"
                                    required>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="password" class="form-control p-4"
                                    name="current_pass" placeholder="Password" value="<?php echo $user['pass']; ?>"
                                    required>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="pass" class="form-control p-4"
                                    name="new_pass" placeholder="password" 
                                    required>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="pass" class="form-control p-4"
                                    name="confirm_pass" placeholder="password" 
                                    required>
                                <p class="help-block text-danger"></p>
                            </div>


                            <div>
                                <button class="btn btn-primary btn-block py-3 px-5"
                                    type="submit" name="store">
                                    Update Password
                                </button><br>
                            <a href="profile.php" class="btn btn-secondary d-block text-center">Cancel</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


<?php
include('footer.php');
?>

