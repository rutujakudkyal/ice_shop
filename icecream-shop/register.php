<?php
session_start();
include('config.php');

if(isset($_POST['btn'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $pass = $_POST['pass'];

$check = " SELECT COUNT(id) from register where email='$email'";
$res = mysqli_query($con,$check);
$count = mysqli_fetch_row($res);

    if($count[0] == 1){
        echo "<script> alert('Email already exists! please login.');
        window.location.href='login.php';</script>";
    }else{
        $sql = " INSERT into register(name,email,contact,pass) values('$name','$email','$contact','$pass')";

        if(mysqli_query($con,$sql)){
            echo "<script> alert('Register successfully');
            window.location.href='login.php';</script>";
        }else{
            echo mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Ice Shop </title>
</head>
<body>
    <div class="register-box">
    <h2>Registration</h2>

    <form method="POST">
        <div class="input-group">
            <label>Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="input-group">
            <label>Contact</label>
            <input type="text" name="contact" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="pass" required>
        </div>

        <input type="submit" name="btn" value="Register" class="btn">
    </form>

    <div class="login-link">
        Already have an account? <a href="login.php">Login</a>
    </div>
</div>
</form>
</body>
</html> 
