<?php include('tenant/includes/db_connect.php'); ?>
<?php
  if(!isset($_GET['id'])){
    header('location:'.TENANT_PATH.'login.php');
    die();
  }
  if(isset($_GET['id'])){
    $tenant_id = $_GET['id'];
  }
?>
<?php
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }
    if(isset($_SESSION['name'])){
        $name = $_SESSION['name'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
      src="https://kit.fontawesome.com/97727431b8.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid d-flex justify-content-between user-login">
            <div class="logo">
              <a class="navbar-brand" href="<?php echo HOME_PATH; ?>?id=<?php echo $_SESSION['id']; ?>&name=<?php echo $_SESSION['name']; ?>">
              <img src="images/logo.png" style="width: 80px;" class="rounded-circle" alt="logo">
            </a>
            </div>
            <div class="ml-4 dropdown d-none">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
               Menu
                </button>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                   <li><a class="dropdown-item" href="#">Rent</a></li>
                   <li><a class="dropdown-item" href="#">Bookings</a></li>
                   <li><a class="dropdown-item" href="#">Gas Bill</a></li>
                   <li><a class="dropdown-item" href="#">Internet Bill</a></li>
                   <li><a class="dropdown-item" href="#">Water Bill</a></li>
                   <li><a class="dropdown-item" href="#">Electricity Bill</a></li>
               </ul>
           </div> 
            <div>
                <h4>From Dashboard</h4>
            </div>
            <div class="d-flex user-profile">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                    $sql = "SELECT * FROM tenant WHERE tenant_id='$tenant_id'";
                    $res = mysqli_query($conn, $sql);
                    if($res == TRUE){
                      $tenant_image = mysqli_fetch_assoc($res)['tenant_image'];
                    }
                    ?>
                    <img src="tenant/images/<?php echo $tenant_image; ?>" class="rounded-circle" alt="user_image" style="width: 50px;">
                    <?php
                ?>
                
                <li>
                  <?php
                    if(isset($_GET['name'])){
                      ?>
                      <a class="nav-link text-dark mr-4"><?php echo $_GET['name']; ?></a>
                      <?php
                    }
                  ?>
                </li>
                </ul>
                <form action="" method="POST">
                <button class="btn btn-danger" type="submit" name="submit">Logout</button>
                </form>
                <?php
                 if(isset($_POST['submit'])){
                  unset($_GET['name'], $_GET['id'], $_SESSION['id'], $_SESSION['name']);
                  header('location:'. HOME_PATH);
                }
                ?>
            </div>
        </div>
      </nav>
      <section class="main-content d-flex mt-4">    
            <div class="left-nav px-5 border-right" style="width: 20%; color: #ff4757; height: 100vh;">
                <h6 class="font-weight-bold mb-4"><i class="fas fa-chart-line mr-2"></i> Dashboard</h6>
                <ul class="nav flex-column">
                    <li class="nav-item border-bottom">
                        <a class="nav-link" aria-current="page" href="#">Rent</a>
                      </li>
                    <li class="nav-item border-bottom">
                      <a class="nav-link" aria-current="page" href="#">Bookings</a>
                    </li>
                    <li class="nav-item border-bottom">
                      <a class="nav-link" href="#">Gas Bill</a>
                    </li>
                    <li class="nav-item border-bottom">
                      <a class="nav-link" href="#">Internet Bill</a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link" href="#">Water Bill</a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Electricity Bill</a>
                    </li>
                  </ul>
            </div> 
            <div class="right-content px-5">
                <h6 class="font-weight-bold" style="color:#ff4757; margin-bottom: 20px;">CURRENT APARTMENT</h6>
                <?php
                  $sql_2 = "SELECT * FROM flat WHERE tenant_id = $tenant_id" ;
                  $res_2 = mysqli_query($conn, $sql_2);
                  if($res_2 == TRUE){
                    $count = mysqli_num_rows($res_2);
                    if($count > 0){
                      ?>
                      <div class="container">
                         <div class="row">
                    <?php
                      while($row = mysqli_fetch_assoc($res_2)){
                        $flat_name = $row['flat_name'];
                        $flat_image = $row['flat_image'];
                        $flat_description = $row['flat_description'];
                        $flat_price = $row['flat_price'];
                        ?>
                        <div class="col" style="flex: 0 0 0%; margin-bottom: 25px;">
                          <div class="card mb-5" style="width: 18rem;">
                            <img class="card-img-top" src="admin/images/flat_images/<?php echo $flat_image; ?>" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title"><?php echo $flat_name; ?></h5>
                              <p class="card-text"><?php echo $flat_description; ?></p>
                              <p>price: <?php echo $flat_price; ?></p>
                              <a href="#" class="btn btn-primary">See Details</a>
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
                    else{
                      ?>
                      <div class="text-danger"><h2>No Flat Available</h2></div>
                      <?php
                    }
                  }
                ?>
                
                <h6 class="font-weight-bold" style="color:#ff4757; margin-bottom: 20px;">LATEST PAYMENT</h6>
                <div class="row">
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Rent</h5>
                              <p class="card-text">Date: 01/01/2022</p>
                              <a href="#" class="btn btn-primary">See Details</a>
                            </div>
                          </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Gas Bill</h5>
                              <p class="card-text">Date: 01/06/2022</p>
                              <a href="#" class="btn btn-primary">See Details</a>
                            </div>
                          </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Electricity Bill</h5>
                              <p class="card-text">Date: 01/05/2022</p>
                              <a href="#" class="btn btn-primary">See Details</a>
                            </div>
                          </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Water Bill</h5>
                              <p class="card-text">Date: 01/05/2022</p>
                              <a href="#" class="btn btn-primary">See Details</a>
                            </div>
                          </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">Internet Bill</h5>
                              <p class="card-text">Date: 01/08/2022</p>
                              <a href="#" class="btn btn-primary">See Details</a>
                            </div>
                          </div>
                    </div>
                </div>
                
                
            </div>
      </section>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>