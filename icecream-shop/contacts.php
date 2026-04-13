<?php
include('header.php');
include('config.php');

if(isset($_POST['store'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sub = $_POST['subject'];
    $mess = $_POST['message'];
    
     $sql = "INSERT into contact (name, email, subject, message) values('$name','$email','$sub','$mess')";
     if(mysqli_query($con,$sql)){
        echo "<script> alert('Record Inserted');</script>";

     }else{
        echo "Error:" . mysqli_error($con);
     }
}
?>



    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-3 mt-lg-5">Contact</h1>
            <div class="d-inline-flex align-items-center text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-circle px-3"></i>
                <p class="m-0">Contact</p>
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
                        Contact Us For Any Query
                    </h1>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="contact-form bg-light rounded p-5">
                        <div id="success"></div>

                        <form method="post" enctype="multipart/form-data">
                            <div class="form-row">

                                <div class="col-sm-6 control-group">
                                    <input type="text" class="form-control p-4"
                                        name="name" placeholder="Your Name"
                                        required
                                        data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="col-sm-6 control-group">
                                    <input type="email" class="form-control p-4"
                                        name="email" placeholder="Your Email"
                                        required
                                        data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>

                            </div>

                            <div class="control-group">
                                <input type="text" class="form-control p-4"
                                    name="subject" placeholder="Subject"
                                    required
                                    data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <textarea class="form-control p-4"
                                    rows="6" name="message"
                                    placeholder="Message"
                                    required
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div>
                                <button class="btn btn-primary btn-block py-3 px-5"
                                    type="submit" name="store">
                                    Send Message
                                </button>
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