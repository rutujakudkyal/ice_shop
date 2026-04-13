<?php
session_start();
include('config.php');

if(isset($_POST['btn'])){

$email = $_POST['email'];
$pass = $_POST['pass'];
 
$sql = "SELECT  *  from register where email='$email' and pass='$pass'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_row($res);

if($row){
    $_SESSION['email'] = $email;
    echo "<script> alert('login successfully');
     window.location.href='index.php';
    </script>";
}else{
    echo "<script> alert('login failed');
    window.location.href='login.php';</script>";
    echo mysqli_error($con);
}
}
?>

                            <!DOCTYPE html>
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Login Page</title>
                            </head>
                            <body>
                            <form method="POST">
                                Enter Email:<input type="text" name="email" placeholder= "Enter Email:"><br>
                                Enter Password:<input type="text" name="pass" placeholder="Enter password:"><br>
                            <button type="submit" name="btn" style="background-color:lightblue;" class="btn btn-primary">Login</button>
                             <a href="register.php">New User? Register</a>

                            </form>
                            </body>
                            </html>