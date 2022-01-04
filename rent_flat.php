<?php 
    include('tenant/includes/db_connect.php'); 
?>
<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    if(isset($_GET['category_name'])){
        $category_name = $_GET['category_name'];
    }
    if(isset($_GET['id'])){
        if($_GET['id'] != 0){
            if(isset($_GET['flat_id'])){
                $tenant_id = $_GET['id'];
                $flat_id = $_GET['flat_id'];
                $sql = "UPDATE flat SET tenant_id = $tenant_id WHERE flat_id = '$flat_id'";
                $res = mysqli_query($conn, $sql);
                if($res == TRUE){
                    if($page){
                        header('location:'.HOME_PATH.'flat.php'.'?id='.$tenant_id);
                    }
                    else{
                        header('location:'.HOME_PATH.'search.php'.'?tenant_id='.$tenant_id.'&category_name='.$category_name);
                    }
                    // echo $_GET['id']. " ".$_GET['flat_id'];
                }
            }
        }
        elseif($_GET['id'] == 0){
            header('location:'.HOME_PATH.'tenant/login.php');
            // echo $_GET['id']. " ".$_GET['flat_id'];
        }
    }
    else{
        if($_GET['id'] == 0){
            header('location:'.HOME_PATH.'tenant/login.php');
            // echo $_GET['id']. " ".$_GET['flat_id'];
        }
        
    }
    
    
?>