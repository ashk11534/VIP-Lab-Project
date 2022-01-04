<?php include('includes/db_connect.php');?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/tenant_login.css">


<body>
<h1 class="text-center">Login</h1>
<hr>
<?php
     if(isset($_SESSION['signup-success'])){
        ?>
        <p class="text-center font-weight-bold" style="color: #2ed573; background: #fff; padding: 2px; margin-top:10px; width: 19.5%; margin-left: auto; margin-right: auto; border-radius: 4px;"><?php echo $_SESSION['signup-success']; ?></p>
        <?php
        unset($_SESSION['signup-success']);
    }
    if(isset($_SESSION['login-failed'])){
        ?>
        <p class="text-center font-weight-bold" style="color: #ff4757; background: #fff; padding: 2px; margin-top:10px; width: 29.5%; margin-left: auto; margin-right: auto; border-radius: 4px;"><?php echo $_SESSION['login-failed']; ?></p>
        <?php
        unset($_SESSION['login-failed']);
    }
?>
<section class="login-form d-flex justify-content-center">
<form action="" method="POST" class="form-content">
    <table>
        <tr>
            <td><input type="email" name="email" placeholder="Enter Email" class="form-control mb-3"></td>
        </tr>
        <tr>
            <td><input type="password" name="password" placeholder="Enter Password" class="form-control mb-3"></td>
        </tr>
        <tr class="text-center">
            <td><input type="submit" name="submit" value="Login" class="btn btn-primary"></td>
        </tr>
    </table>
</form>
</section>
</body>
<?php
    if(isset($_POST["submit"])){
        // echo "Clicked";
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $sql = "SELECT * FROM tenant WHERE tenant_email='$email' AND tenant_password='$password'";
        $res = mysqli_query($conn, $sql);
        if($res == TRUE){
            $count = mysqli_num_rows($res);
            if($count == 1){
                // echo "You are logged in";
                $tenant_id = mysqli_fetch_assoc($res)['tenant_id'];
                $tenant_image = mysqli_fetch_assoc($res)['tenant_image'];
                $name_exploded = explode('@', $email); // novo@gmail.com --> novo gmail.com
                $name = $name_exploded[0];
                // $_SESSION['tenant_id'] = $tenant_id;
                // $_SESSION['tenant_name'] = $name;
                header('location:'.HOME_PATH.'?id='.$tenant_id.'&name='. $name);
            }
            else{
                // echo "Failed to login";
                $_SESSION['login-failed'] = "You're not signed up. Please, signup first";
                header('location:'.TENANT_PATH.'signup.php');
            }
        }
        else{
            echo "Failed to login";
        }
    }
?>