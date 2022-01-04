<?php include('../includes/db_connect.php'); ?>

<?php
    if(isset($_GET['id'])){
        $flat_id = $_GET['id'];
    }
    $sql = "SELECT flat_image FROM flat WHERE flat_id='$flat_id'";
    $res = mysqli_query($conn, $sql);
    if($res == TRUE){
        $count = mysqli_num_rows($res);
        if($count == 1){
            $image = mysqli_fetch_assoc($res)['flat_image'];
            unlink('images/flat_images/'.$image);
        }
    }
    $sql_2 = "DELETE FROM flat WHERE flat_id='$flat_id'";
    $res_2 = mysqli_query($conn, $sql_2);
    if($res_2 == TRUE){
        $_SESSION['delete'] = 'FLat deleted successfully.';
        header('location:'.ADMIN_PATH.'add-flat.php');
    }
    else{
        $_SESSION['delete'] = 'Failed to delete.';
        header('location:'.ADMIN_PATH.'add-flat.php');
    }
?>