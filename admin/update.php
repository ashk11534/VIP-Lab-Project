<?php 
    include('../includes/db_connect.php'); 
    ob_start();
?>
<?php
    if(isset($_GET['id'])){
        $flat_id = $_GET['id'];
    }
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="css/add-flat.css">
<?php
    $sql_3 = "SELECT * FROM flat WHERE flat_id='$flat_id'";
    $res_3 = mysqli_query($conn, $sql_3);
    if($res_3 == TRUE){
        $count_3 = mysqli_num_rows($res_3);
        if($count_3 == 1){
            while($row = mysqli_fetch_assoc($res_3)){
                $flat_name = $row['flat_name'];
                $flat_area = $row['flat_area'];
                $number_of_bathrooms = $row['number_of_bathrooms'];
                $number_of_bedrooms = $row['number_of_bedrooms'];
                $flat_price = $row['flat_price'];
                $flat_description = $row['flat_description'];
                $flat_address = $row['flat_address'];
                $flat_current_image = $row['flat_image'];
                $category_id = $row['category_id'];
            }
        }
    }
?>
<?php
    $sql = "SELECT category_name FROM category WHERE category_id='$category_id'";
    $res = mysqli_query($conn, $sql);
    if($res == TRUE){
        $count = mysqli_num_rows($res);
        if($count == 1){
            $category_name = mysqli_fetch_assoc($res)['category_name'];
        }
    }
?>
<?php
    $cat_arr = array();
    $sql_4 = "SELECT category_id FROM category";
    $res_4 = mysqli_query($conn, $sql_4);
    if($res_4 == TRUE){
        $count = mysqli_num_rows($res_4);
        if($count > 0){
            while($row = mysqli_fetch_assoc($res_4)){
                $category_id = $row['category_id'];
                array_push($cat_arr, $category_id);
            }
        }
    }
?>
<div class="container-fluid">
<h2>Update Flat</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Flat_category</td>
                <td>
                    <select name="category">
                        <option <?php if($category_name == 'duplex'){echo 'selected'; } ?> value="<?php echo $cat_arr[1]; ?>">Duplex</option>
                        <option <?php if($category_name == 'triplex'){echo 'selected'; } ?> value="<?php echo $cat_arr[0]; ?>">Triplex</option>      
                    </select>
                </td>

            </tr>
            <tr>
                <td>flat_address</td>
                <td><input type="text" name="flat_address" value="<?php echo $flat_address; ?>"></td>
                
            </tr>
            <input type="hidden" name="flat_current_image" value="<?php echo $flat_current_image; ?>">
            <tr>
                <td>current_image</td>
                <td>
                    <img src="images/flat_images/<?php echo $flat_current_image; ?>" width="50px">
                </td>
            </tr>
            <tr>
                <td>flat_image</td>
                <td><input type="file" name="flat_image"></td>
                
            </tr>
            <tr>
                <td>flat_name</td>
                <td><input type="text" name="flat_name" value="<?php echo $flat_name; ?>"></td>
                
            </tr>
            <tr>
                <td>flat_price</td>
                <td><input type="number" name="flat_price" value="<?php echo $flat_price; ?>"></td>
                
            </tr>
            <tr>
                <td>flat_area</td>
                <td><input type="number" name="flat_area" value="<?php echo $flat_area; ?>"></td>
                
            </tr>
            <tr>
                <td>number_of_bedrooms</td>
                <td><input type="number" name="number_of_bedrooms" value="<?php echo $number_of_bedrooms; ?>"></td>
                
            </tr>
            <tr>
                <td>number_of_bathrooms</td>
                <td><input type="number" name="number_of_bathrooms" value="<?php echo $number_of_bathrooms; ?>"></td>
                
            </tr>
            <tr>
                <td>description</td>
                <td>
                    <textarea name="description"cols="30" rows="5"><?php echo $flat_description; ?></textarea>
                </td>
                
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Update Flat">
                </td>
            </tr> 
        </table>
    </form>
</div>
<?php
    if(isset($_POST['submit'])){
        if(isset($_FILES['flat_image']['name'])){
            if($_FILES['flat_image']['name'] != ''){
                unlink('images/flat_images/'.$flat_current_image);
                $image = $_FILES['flat_image']['name'];
                $exploded = explode('.', $image);
                $image_extension = end($exploded);
                $image_name = "flat-image-".date("h-i-sa").rand(000, 999).".".$image_extension;
                $source_path = $_FILES["flat_image"]["tmp_name"];
                $destination_path = 'images/flat_images/'.$image_name;
                $uploaded = move_uploaded_file($source_path, $destination_path);
            }
        }
        $category = $_POST['category'];
        $address = $_POST['flat_address'];
        $name = $_POST['flat_name'];
        $price = $_POST['flat_price'];
        $area = $_POST['flat_area'];
        $bedrooms = $_POST['number_of_bedrooms'];
        $bathrooms = $_POST['number_of_bathrooms'];
        $descript = $_POST['description'];
        $description = nl2br(htmlentities($descript, ENT_QUOTES, 'UTF-8'));
        $flat_current_image = $_POST['flat_current_image'];

        if($uploaded == TRUE){
            $sql2 = "UPDATE flat SET
                flat_name = '$name',
                flat_area = $area,
                number_of_bathrooms = $bathrooms,
                number_of_bedrooms = $bedrooms,
                flat_price = $price,
                flat_description = '$description',
                flat_address = '$address',
                flat_image = '$image_name',
                category_id = $category
                WHERE flat_id='$flat_id'
            ";
            $res2 = mysqli_query($conn, $sql2);
            // echo $res2;
            if($res2 == TRUE){
                // echo 'Flat Added successfully';
                $_SESSION['update'] = 'Flat updated successfully.';
                header('location:'.ADMIN_PATH.'add-flat.php');
            }
            else{
                $_SESSION['update'] = 'Failed to update flat';
                header('location:'.ADMIN_PATH.'add-flat.php');
            }
        }
        else{
            $sql2 = "UPDATE flat SET
                flat_name = '$name',
                flat_area = $area,
                number_of_bathrooms = $bathrooms,
                number_of_bedrooms = $bedrooms,
                flat_price = $price,
                flat_description = '$description',
                flat_address = '$address',
                flat_image = '$flat_current_image',
                category_id = $category
                WHERE flat_id='$flat_id'
            ";
            $res2 = mysqli_query($conn, $sql2);
            // echo $res2;
            if($res2 == TRUE){
                // echo 'Flat Added successfully';
                $_SESSION['update'] = 'Flat updated successfully.';
                header('location:'.ADMIN_PATH.'add-flat.php');
            }
            else{
                $_SESSION['update'] = 'Failed to update flat';
                header('location:'.ADMIN_PATH.'add-flat.php');
            }
            header('location:'.ADMIN_PATH.'add-flat.php');
        }

    }
    ob_end_flush();
?>