<?php 
    include('../includes/db_connect.php'); 
    ob_start();
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="css/add-flat.css">
<?php include('partials/navbar.php'); ?>

<?php
    $cat_arr = array();
    $sql = "SELECT * FROM category";
    $res = mysqli_query($conn, $sql);
    if($res == TRUE){
        $count = mysqli_num_rows($res);
        if($count > 0){
            while($row = mysqli_fetch_assoc($res)){
                $category_id = $row['category_id'];
                array_push($cat_arr, $category_id);
            }
        }
    }
    // print_r($cat_arr);
    // echo $cat_arr[0];
    // echo $cat_arr[1];  
?>
<?php
    if(isset($_SESSION['delete'])){
        ?>
            <p class="text-center font-weight-bold vanish" style="color: #2ed573; background: #333; padding: 2px; margin-top:10px; width: 19.5%; margin-left: auto; margin-right: auto; border-radius: 4px;"><?php echo $_SESSION['delete']; ?></p>
        <?php
        unset($_SESSION['delete']);
    }
    if(isset($_SESSION['update'])){
        ?>
            <p class="text-center font-weight-bold vanish" style="color: #2ed573; background: #333; padding: 2px; margin-top:10px; width: 19.5%; margin-left: auto; margin-right: auto; border-radius: 4px;"><?php echo $_SESSION['update']; ?></p>
        <?php
        unset($_SESSION['update']);
    }
    if(isset($_SESSION['add'])){
        ?>
            <p class="text-center font-weight-bold vanish" style="color: #2ed573; background: #333; padding: 2px; margin-top:10px; width: 19.5%; margin-left: auto; margin-right: auto; border-radius: 4px;"><?php echo $_SESSION['add']; ?></p>
        <?php
        unset($_SESSION['add']);
    }
?>
<script>
    const p = document.querySelector('.vanish');
    setTimeout(() => {
        p.parentNode.removeChild(p);
    }, 3000);
</script>
<div class="container-fluid">
<h2>Add Flat</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Flat_category</td>
            <td>
                <select name="category" class="form-control">
                    <option value="<?php echo $cat_arr[1]; ?>">Duplex</option>
                    <option value="<?php echo $cat_arr[0]; ?>">Triplex</option>
                </select>
            </td>

        </tr>
        <tr>
            <td>flat_address</td>
            <td><input type="text" name="flat_address" class="form-control"></td>
            
        </tr>
        <tr>
            <td>flat_image</td>
            <td><input type="file" name="flat_image" class="form-control"></td>
            
        </tr>
        <tr>
            <td>flat_name</td>
            <td><input type="text" name="flat_name" class="form-control"></td>
            
        </tr>
        <tr>
            <td>flat_price</td>
            <td><input type="number" name="flat_price" class="form-control"></td>
            
        </tr>
        <tr>
            <td>flat_area</td>
            <td><input type="number" name="flat_area" class="form-control"></td>
            
        </tr>
        <tr>
            <td>number_of_bedrooms</td>
            <td><input type="number" name="number_of_bedrooms" class="form-control"></td>
            
        </tr>
        <tr>
            <td>number_of_bathrooms</td>
            <td><input type="number" name="number_of_bathrooms" class="form-control"></td>
            
        </tr>
        <tr>
            <td>description</td>
            <td>
                <textarea name="description"cols="30" rows="5" class="form-control"></textarea>
            </td>
            
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="Add Flat" class="btn btn-primary">
            </td>
        </tr> 
    </table>
</form>

<?php
    $sql = 'SELECT * FROM flat';
    $res = mysqli_query($conn, $sql);
    
    if($res == TRUE){
        $count = mysqli_num_rows($res);
        ?>
        <table class="secondary-table">
                <tr>
                    <th>Name</th>
                    <th>Area</th>
                    <th>Number Of Bedrooms</th>
                    <th>Number Of Bathrooms</th>
                    <th>Price</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Action</th>
                    <th>Status</th>
                    <th>Release</th>
                </tr>
        <?php
        if($count > 0){
            while($row = mysqli_fetch_assoc($res)){ // $row = ['admin_first_name'=>'joy', 'admin_last_name'=>'mojumdar']
                $flat_id = $row['flat_id'];
                $tenant_id = $row['tenant_id'];
                $name = $row['flat_name'];
                $area = $row['flat_area'];
                $bedrooms = $row['number_of_bedrooms'];
                $bathrooms = $row['number_of_bathrooms'];
                $price = $row['flat_price'];
                $address = $row['flat_address'];
                $image = $row['flat_image'];
                ?>
                    <tr>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $area; ?></td>
                        <td><?php echo $bedrooms; ?></td>
                        <td><?php echo $bathrooms; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $address; ?></td>
                        <td>
                            <img src="images/flat_images/<?php echo $image; ?>" width="50px"> 
                        </td>
                        <td>
                            <a href="<?php echo ADMIN_PATH; ?>update.php?id=<?php echo $flat_id; ?>" class="btn btn-primary">Update</a>
                            <a href="<?php echo ADMIN_PATH; ?>delete.php?id=<?php echo $flat_id; ?>" class="btn btn-danger">Delete</a>
                        </td>
                        <td>
                            <?php
                                if($tenant_id != NULL){
                                    ?>
                                        <button class="btn btn-danger">Booked</button>
                                    <?php
                                }
                                else{
                                    ?>
                                        <button class="btn btn-success">Available</button>
                                    <?php
                                }
                            ?>
                        </td>
                        <td>
                        <?php
                                if($tenant_id != NULL){
                                    ?>
                                        <a href="<?php echo ADMIN_PATH; ?>release-flat.php?id=<?php echo $flat_id; ?>" class="btn btn-success">Release</a>
                                    <?php
                                }
                            ?>
                        </td>

                    </tr>
                <?php
            }
        }
        else{
            echo "<tr>
                    <td colspan='7' style='text-align: center;'>
                        <h2>No Flat Available</h2>
                    </td>
                 </tr>";
        }
        ?>
        </table>
        <?php 
    }
?>
<?php
    if(isset($_POST['submit'])){
        $flat_id = 'flat-'.rand(0000, 9999);
        $category = $_POST['category'];
        $address = $_POST['flat_address'];
        $image = $_FILES['flat_image']['name'];
        $name = $_POST['flat_name'];
        $price = $_POST['flat_price'];
        $area = $_POST['flat_area'];
        $bedrooms = $_POST['number_of_bedrooms'];
        $bathrooms = $_POST['number_of_bathrooms'];
        $descript = $_POST['description'];
        $description = nl2br(htmlentities($descript, ENT_QUOTES, 'UTF-8'));
        $exploded = explode('.', $image);
        $image_extension = end($exploded);
        $image_name = "flat-image-".date("h-i-sa").rand(000, 999).".".$image_extension;
        $source_path = $_FILES["flat_image"]["tmp_name"];
        $destination_path = 'images/flat_images/'.$image_name;
        $uploaded = move_uploaded_file($source_path, $destination_path);
        // echo $flat_id." ".$bathrooms." ".$bedrooms." ".$address." ".$image_name." ".$price." ".$name." ".$area." ".$description." ".$category;

        if($uploaded == TRUE){
            $sql2 = "INSERT INTO flat SET
                flat_id = '$flat_id',
                flat_name = '$name',
                flat_area = $area,
                number_of_bathrooms = $bathrooms,
                number_of_bedrooms = $bedrooms,
                flat_price = $price,
                flat_description = '$description',
                flat_address = '$address',
                flat_image = '$image_name',
                category_id = $category
            ";
            $res2 = mysqli_query($conn, $sql2);
            // echo $res2;
            if($res2 == TRUE){
                // echo 'Flat Added successfully';
                $_SESSION['add'] = 'Flat Added successfully';
                header('location:'.ADMIN_PATH.'add-flat.php');
            }
            else{
                // echo 'Failed to add flat';
                $_SESSION['add'] = 'Failed to add flat';
                header('location:'.ADMIN_PATH.'add-flat.php');
            }
        }
        else{
            // echo 'Failed to add flat. It seems you did not upload image';
            $_SESSION['add'] = 'Failed to add flat. It seems you did not upload image or insert any data';
            header('location:'.ADMIN_PATH.'add-flat.php');
        }

    }
    ob_end_flush();
?>
</div>