<?php include('../includes/db_connect.php'); ?>
<?php
    if(isset($_GET['id'])){
        $flat_id = $_GET['id'];
    }
    $sql = "UPDATE flat SET tenant_id=NULL WHERE flat_id='$flat_id'";
    $res = mysqli_query($conn, $sql);
    if($res == TRUE){
        header('location:'.ADMIN_PATH.'add-flat.php');
    }
?>