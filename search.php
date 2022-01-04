<?php include('tenant/includes/db_connect.php'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="css/category.css">
<section class="main-nav">
        <ul>
          <div class="logo">
            <a class="navbar-brand" href="<?php echo HOME_PATH;?>">
              <img src="images/logo.png" style="width: 80px;" class="rounded-circle" alt="logo">
            </a>
          </div>
          <div class="push"></div>
          <div class="nav-items">
            <a href="index.php"><li>Home</li></a>
            <a href="category.php"><li>Category</li></a>
            <a href="about.php"><li>About</li></a>
          </div>
        </ul>
</section>
<?php

    if(isset($_GET['category_name'])){
        // echo $_GET['category_name'];
        $category_name = strtolower($_GET['category_name']);
        $sql = "SELECT category_id FROM category WHERE category_name='$category_name'";
        $res = mysqli_query($conn, $sql);
        if($res == TRUE){
            $count = mysqli_num_rows($res);
            if($count == 1){
                $row = mysqli_fetch_assoc($res);
                $category_id = $row['category_id'];
            }
            else{
                // echo 'Category not found!!!';
                header('location:'.HOME_PATH);
            }
           
        }
        $sql_2 = "SELECT * FROM flat WHERE category_id=$category_id";
        $res_2 = mysqli_query($conn, $sql_2);
        if($res_2 == TRUE){
            $count = mysqli_num_rows($res_2);
            if($count > 0){
                ?>
            <div class="container">
                <div class="row">
            <?php
            while($row = mysqli_fetch_assoc($res_2)){
                $flat_id = $row['flat_id'];
                $tenant_id = $row['tenant_id'];
                $flat_name = $row['flat_name'];
                $flat_price = $row['flat_price'];
                $flat_image = $row['flat_image'];
                $flat_description = $row['flat_description'];
                ?>
                        <div class="col" style="flex: 0 0 0%; margin-bottom: 25px;">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="admin/images/flat_images/<?php echo $flat_image ?>" alt="Card image cap" style="height:15rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $flat_name; ?></h5>
                                    <p class="card-text"><?php echo $flat_description; ?></p>
                                    <p><?php echo $flat_price; ?></p>
                                    <?php
                                        if($tenant_id == NULL){
                                            ?>
                                             <a href="<?php echo HOME_PATH.'rent_flat.php';?>?id=<?php if(isset($_GET['tenant_id'])){echo $_GET['tenant_id']; }else{echo 0;} ?>&flat_id=<?php echo $flat_id; ?>&category_name=<?php echo $_GET['category_name'];?>" class="btn btn-primary">Rent</a>
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <a href="#" class="btn btn-danger">Booked</a>
                                            <?php
                                        }
                                    ?>
                                   
                                </div>
                            </div>
                        </div>
                <?php
            }
            ?>
            </div>
            </div>
            <?php
            }
        } 
    }
?>