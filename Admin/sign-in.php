
<?php
$con = mysqli_connect("localhost","root","","iceshop");

session_start();

if(isset($_POST['btn'])){
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $sql = "SELECT count(id) FROM admin WHERE email='$email' AND pass='$password'";
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_row($res);

    if($row[0] == 1){
        $_SESSION['email'] = $email;

        echo "<script>
        alert('Login Successfully...');
        window.location.href='index.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Login Failed...');
        window.location.href='login.php';
        </script>";

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
                            <style>
                             .form-group{

                                    width: 350px;
                                    background: rgba(255, 255, 255, 0.9);
                                    padding: 25px;
                                    margin: 100px auto;
                                    border-radius: 10px;
                                    box-shadow: 0px 0px 10px black;
                                    text-align: center;
                                    }

                             </style>
                             
                            <body>
                            <div class="form-group">
                            <h2>Login</h2>

                            <form method="POST">

                          <label>Enter Email:</label><br>
                           <input type="text" name="email" placeholder="Enter email:" required><br><br>

                          <label>Password: </label><br>
                           <input type="text" name="pass" placeholder="Enter password:"  required><br><br>

                          <button type="submit" name="btn" style="background-color:lightpink;" class="btn btn-primary">Sign in</button>
                            </form>
                           </div>
                            </body>
                            </html>
