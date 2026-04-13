<?php
if (!isset($_SESSION)) {
    session_start();
}

include('config.php');
$name = "";

if(isset($_SESSION['email'])){

    $email = $_SESSION['email'];
    $sql = "SELECT * from register where email='$email'";
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_row($res);

    // ✅ ADD THIS CHECK HERE
    if($row){
        $name = $row[1];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>iCREAM - Ice Cream Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<!-- Topbar Start -->
<div class="container-fluid bg-primary py-3 d-none d-md-block">
    <div class="container">
        <div class="row">

            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white pr-3" href="">FAQs</a>
                    <span class="text-white">|</span>
                    <a class="text-white px-3" href="">Help</a>
                    <span class="text-white">|</span>
                    <a class="text-white pl-3" href="">Support</a>
                </div>
            </div>

            <div class="col-md-6 text-center text-lg-right">
                <!--<div class="d-inline-flex align-items-center">
                    ...
                </div>-->

                <div class="d-inline-flex align-items-center">
                    <img src="../Admin/assets/images/mega-menu/logo.png" width="40px">

                    <?php
                    if(!isset($_SESSION['email'])) {
                        echo '<a href="login.php" class="btn btn-primary">Login</a>';
                    } else {
                        echo '<a href="logout.php" class="btn btn-primary">Logout</a>';
                    ?>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="color:white;">
                            <i><span><?php echo htmlspecialchars($name); ?></span></i>
                        </a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="profile.php" class="dropdown-item"><i class='fas fa-user-circle' style='font-size:18px;color:blue'></i>
                              Profile
                            </a>
                            <a href="myorder.php" class="dropdown-item"><i class='fas fa-archive' style='font-size:18px;color:violt'></i>
                              My Orders
                            </a>
                            <a href="wishlist.php" class="dropdown-item"><i class="fa fa-heart" style="font-size:18px;color:violt"></i>
                              Wishlist
                            </a>
                            <a href="logout.php" class="dropdown-item"><i class='fas fa-user-lock' style='font-size:18px;color:violt'></i>
                              Logout
                            </a>
                        </div>
                    </div>

                    <?php
                    }
                    ?>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0">
    <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow p-lg-0">
            
            <a href="index.php" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-primary">
                    <span class="text-secondary">i</span>CREAM
                </h1>
            </a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

                <!-- LEFT MENU -->
                <div class="navbar-nav ml-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>

                    <!-- FIX: Category moved inside navbar-nav -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <?php
                            $sql="select * from category";
                            $res=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_row($res)){
                            ?>
                                <a href="product.php?id=<?php echo $row[0];?>" class="dropdown-item">
                                    <?php echo $row[1];?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>

                </div>

                <!-- CENTER LOGO -->
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="navbar-brand mx-5 d-none d-lg-block">
                        <h1 class="m-0 display-4 text-primary">
                            <span class="text-secondary"><i>Dwarka</i></span>
                            <img src="../Admin/assets/images/mega-menu/ice.png" width="40px">
                        </h1>
                    </a>
                </div>

                <!-- RIGHT MENU -->
                <div class="navbar-nav mr-auto py-0">
                    <a href="service.php" class="nav-item nav-link">Service</a>
                    <a href="gallery.php" class="nav-item nav-link">Gallery</a>
                    <a href="contacts.php" class="nav-item nav-link">Contact</a>

                    <a href="cart.php" class="nav-item nav-link">
                        <img src="../Admin/assets/images/mega-menu/car1.png" width="40px">
                    </a>

                
                </div>

            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->