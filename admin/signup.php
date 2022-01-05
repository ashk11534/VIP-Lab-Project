<?php include('../includes/db_connect.php'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="css/admin-signup.css">

<body>
<h1 class="text-center">Signup</h1>
<hr>
<?php
    if(isset($_SESSION['login-failed'])){
        ?>
        <p class="text-center font-weight-bold vanish" style="color: #2ed573; background: #fff; padding: 2px; margin-top:10px; width: 19.5%; margin-left: auto; margin-right: auto; border-radius: 4px;"><?php echo $_SESSION['login-failed']; ?></p>
        <?php
        unset($_SESSION['login-failed']);
    }
?>
<script>
    const p = document.querySelector('.vanish');
    setTimeout(() => {
        p.parentNode.removeChild(p);
    }, 3000);
</script>
<section class="signup-form d-flex justify-content-center">
<form action="" method="POST" enctype="multipart/form-data" class="form-content">
    <table>
        <tr>
            <td><input type="text" name="first_name" placeholder="Enter First Name" class="form-control mb-3"></td>
        </tr>
        <tr>
            <td><input type="text" name="last_name" placeholder="Enter Lat Name" class="form-control mb-3"></td>
        </tr>
        <tr>
            <td><input type="file" name="admin_image" class="form-control mb-3"></td>
        </tr>
        <tr>
            <td><input type="email" name="email" placeholder="Enter Email" class="form-control mb-3"></td>
        </tr>
        <tr>
            <td><input type="password" name="password" placeholder="Enter Password" class="form-control mb-3"></td>
        </tr>
        <tr class="text-center">
            <td><input type="submit" name="submit" value="Signup" class="btn btn-primary"></td>
        </tr>
    </table>
</form>
</section>
</body>
<?php
    if(isset($_POST["submit"])){
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $image = $_FILES["admin_image"]["name"];
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $exploded = explode('.', $image);
        $image_extension = end($exploded);
        $image_name = "admin-image-".date("h-i-sa").rand(000, 999).".".$image_extension;
        $source_path = $_FILES["admin_image"]["tmp_name"];
        $destination_path = 'images/admin_images/'.$image_name;
        $uploaded = move_uploaded_file($source_path, $destination_path);

        $sql2 = "SELECT * FROM admin WHERE admin_email='$email'";
        $res2 = mysqli_query($conn, $sql2);
        if($res2 == True){
            $count = mysqli_num_rows($res2);
            if($count == 1){
                echo 'User already exists';
            }
            else{
                if($uploaded == true){
                    $sql = "INSERT INTO admin SET
                        admin_first_name = '$first_name',
                        admin_last_name = '$last_name',
                        admin_email = '$email',
                        admin_password = '$password',
                        admin_image = '$image_name'
                    ";
                    $res = mysqli_query($conn, $sql);
                    if($res == TRUE){
                        $_SESSION['signup-success'] = 'You can now login';
                        header('location:'.ADMIN_PATH.'login.php');
                    }
                    else{
                        echo 'failed to sign up';
                    }
                }
            }
            
        }
        else{
            echo 'failed to sign up';
        }
  
    }
?>