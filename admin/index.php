<?php include('../includes/db_connect.php'); ?>
<?php
    if(!isset($_SESSION['login'])){
        $_SESSION['login-failed'] = 'You need to login first to access admin panel';
        header('location:'.ADMIN_PATH.'login.php');
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <?php include('partials/navbar.php'); ?>
    <?php
        $sql = 'SELECT * FROM admin ORDER BY admin_id DESC';
        $res = mysqli_query($conn, $sql);
       
        if($res == TRUE){
            $count = mysqli_num_rows($res);
            ?>
            <div class="container-fluid">
            <h2>Add Admin</h2>
            <a href="<?php echo ADMIN_PATH.'signup.php'; ?>" class="btn btn-warning">Add Admin</a>
            <table>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Image</th>
                    </tr>
            <?php
            if($count > 0){
                while($row = mysqli_fetch_assoc($res)){ // $row = ['admin_first_name'=>'joy', 'admin_last_name'=>'mojumdar']
                    $first_name = $row['admin_first_name'];
                    $last_name = $row['admin_last_name'];
                    $email = $row['admin_email'];
                    $image = $row['admin_image'];
                    ?>
                        <tr>
                            <td><?php echo $first_name; ?></td>
                            <td><?php echo $last_name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td>
                                <img src="images/admin_images/<?php echo $image; ?>" width="50px"> 
                            </td>
                        </tr>
                    <?php
                }
                
            }
            else{
                echo "<tr>
                        <td colspan='7' style='text-align: center;'>
                            <h2>No Admin Available</h2>
                        </td>
                     </tr>";
            }
            ?>
            </table>
            </div>
            <?php
        }

    ?>
    
</body>
</html>