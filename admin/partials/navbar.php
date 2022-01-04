<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo">
                <a class="navbar-brand" href="http://localhost/PHP_PROJECTS/final_VIP_lab_project/">
                    <img src="../images/logo.png" style="width: 80px;" class="rounded-circle" alt="logo">
                </a>
            </div>
            <div class="collapse navbar-collapse d-flex" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ADMIN_PATH; ?>">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/PHP_PROJECTS/final_VIP_lab_project/admin/add-flat.php">Flat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ADMIN_PATH.'add-category.php' ?>">Category</a>
                </li>
                <li class="nav-item">
                    <form action="" method="POST">
                        <input type="submit" name="logout" value="Logout" class="btn btn-danger">
                    </form>
                </li>
                </ul>
            </div>
    
    </nav>
    <?php
        if(isset($_POST['logout'])){
            session_destroy();
            header('location:'.ADMIN_PATH.'login.php');
        }
    ?>