  <?php
  session_start();

  if(isset($_GET['id'])){
    $id = $_GET['id'];

  if(isset($_SESSION['wishlist'])){

                $key = array_search($id, $_SESSION['wishlist']);

                if($key !== false){
                    unset($_SESSION['wishlist'][$key]);
                }

                $_SESSION['wishlist'] = array_values($_SESSION['wishlist']);
            }


    // Redirect
    echo "<script>
        alert('Delete product');
        window.location.href='wishlist.php';
      </script>";
   exit();
   
  }
?>