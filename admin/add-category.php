<?php 
    include('../includes/db_connect.php'); 
?>
<?php include('partials/navbar.php'); ?>

<div class="container-fluid d-flex flex-column align-items-center">
<h2 class="mt-3">Add Category</h2>
<?php
   if(isset($_SESSION['category'])){
       ?>
       <p class="text-center font-weight-bold" style="color: #2ed573; background: #fff; padding: 2px; margin-top:10px; width: 19.5%; margin-left: auto; margin-right: auto; border-radius: 4px;"><?php echo $_SESSION['category']; ?></p>
       <?php
       unset($_SESSION['category']);
    
} 
?>

<form action="" method="POST" style="border: 1px solid #333; padding: 20px; margin-top:10px;">
    <table>
        <tr>
            <td>Category Name</td>
            <td><input type="text" name="category_name" required></td>   
        </tr>
    </table>
    <div class="text-center mt-3">
        <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
    </div>
</form>
</div>
<?php
    if(isset($_POST['submit'])){
        if(isset($_POST['category_name'])){
            $category_id = rand(0000, 9999);
            $category_name = $_POST['category_name'];

            $sql = "INSERT INTO category SET
                category_id = '$category_id',
                category_name = '$category_name'
            ";
            $res = mysqli_query($conn, $sql);
            if($res == TRUE){
                $_SESSION['category'] = 'Category Added successfully';
                header('location:'.ADMIN_PATH.'add-category.php');
            }
            else{
                echo 'Failed to add category';
            }
        }
        else{
            header('location:'.ADMIN_PATH.'add-category.php');
        }
    }
?>