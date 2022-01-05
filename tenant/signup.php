<?php include('includes/db_connect.php'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/tenant_signup.css">

<body>
<h1 class="text-center">Signup</h1>
<hr>
<?php
    if(isset($_SESSION['login-failed'])){
        ?>
        <p class="text-center font-weight-bold vanish" style="color: #ff4757; background: #fff; padding: 2px; margin-top:10px; width: 29.5%; margin-left: auto; margin-right: auto; border-radius: 4px;"><?php echo $_SESSION['login-failed']; ?></p>
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
            <td><input type="file" name="tenant_image" class="form-control mb-3"></td>
        </tr>
        <tr>
            <td><input type="text" name="address" placeholder="Enter Address" class="form-control mb-3"></td>
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
        $image = $_FILES["tenant_image"]["name"];
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $address = $_POST['address'];
        $exploded = explode('.', $image);
        $image_extension = end($exploded);
        $image_name = "tenant-image-".date("h-i-sa").rand(000, 999).".".$image_extension;
        $source_path = $_FILES["tenant_image"]["tmp_name"];
        $destination_path = 'images/'.$image_name;
        $uploaded = move_uploaded_file($source_path, $destination_path);

        $sql2 = "SELECT * FROM tenant WHERE tenant_email='$email'";
        $res2 = mysqli_query($conn, $sql2);
        if($res2 == True){
            $count = mysqli_num_rows($res2);
            if($count == 1){
                echo 'User already exists';
            }
            else{
                if($uploaded == true){
                    $sql = "INSERT INTO tenant SET
                        tenant_first_name = '$first_name',
                        tenant_last_name = '$last_name',
                        tenant_email = '$email',
                        tenant_password = '$password',
                        tenant_address = '$address',
                        tenant_image = '$image_name'
                    ";
                    $res = mysqli_query($conn, $sql);
                    if($res == TRUE){
                        $_SESSION['signup-success'] = 'You can now login';
                        header('location:'.TENANT_PATH.'login.php');
                    }
                    else{
                        echo 'failed to sign up';
                    }
                }
                else{
                    echo 'Image not selected';
                }
            }
            
        }
        else{
            echo 'failed to sign up';
        }
  
    }
?>