<?php include('tenant/includes/db_connect.php'); ?>
<?php 
  if(isset($_SESSION['id'])){$id = $_SESSION['id'];} 
  if(isset($_SESSION['name'])){$name = $_SESSION['name'];} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <script
    src="https://kit.fontawesome.com/97727431b8.js"
    crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/category.css">
</head>
<body>
    <section class="secondary-nav">
        <ul>
          <div class="left-items">
          <li><a href="login.html">Login</a></li>
          <li><a href="register.html">Register</a></li>
          </div>
          <div class="push"></div>
          <div class="right-items">
            <li>saj@gmail.com</li>
            <li>+8801932-629230</li>
          </div>
        </ul>
      </section>
      <section class="main-nav">
        <ul>
          <div class="logo">
            <a class="navbar-brand" href="<?php echo HOME_PATH.'?id='.$id.'&name='.$name;?>">
              <img src="images/logo.png" style="width: 80px;" class="rounded-circle" alt="logo">
            </a>
          </div>
          <div class="push"></div>
          <div class="nav-items">
            <a href="<?php echo HOME_PATH; ?>?id=<?php echo $_SESSION['id']; ?>&name=<?php echo $_SESSION['name']; ?>"><li>Home</li></a>
            <a href="category.php"><li>Category</li></a>
            <a href="about.php"><li>About</li></a>
          </div>
        </ul>
      </section>
      <section class="category">
        <div class="overlay d-flex justify-content-center align-items-center">
          <div>
            <h1 class="font-weight-bold">Category</h1>
          </div>
        </div>
      </section>
      <section class="category-main-duplex">
        <h1 class="text-center">Duplex</h1>
        <hr>
        <div class="container">
            <div class="row">
              <div class="col-5 main-image"></div>
              <div class="col-7">
                <p class="text-justify ml-5">
                  It is a long established fact that a reader will be distracted by
                  the readable content of a page when looking at its layout. The point
                  of using Lorem Ipsum is that it has a more-or-less normal
                  distribution of letters, as opposed to using 'Content here, content
                  here', making it look like readable English,  the readable content of a page when looking at its layout. The point
                  of using Lorem Ipsum is that it has a more-or-less normal
                  distribution of letters, as opposed to using 'Content here, content
                  here', making it look like readable English..
                </p>
                <p class="text-justify ml-5">
                  It is a long established fact that a reader will be distracted by
                  the readable content of a page when looking at its layout. The point
                  of using Lorem Ipsum is that it has a more-or-less normal
                  distribution of letters, as opposed to using 'Content here, content
                  here', making it look like.
                </p>
              </div>
            </div>
            <a href="<?php echo HOME_PATH.'search.php'.'?category_name=duplex'; ?>" class="btn btn-primary">See All Flats</a>
          </div>
      </section>
      <section class="category-main-triplex">
        <h1 class="text-center">Triplex</h1>
        <hr>
        <div class="container">
            <div class="row">
              <div class="col-5 main-image"></div>
              <div class="col-7">
                <p class="text-justify ml-5">
                  It is a long established fact that a reader will be distracted by
                  the readable content of a page when looking at its layout. The point
                  of using Lorem Ipsum is that it has a more-or-less normal
                  distribution of letters, as opposed to using 'Content here, content
                  here', making it look like readable English,  the readable content of a page when looking at its layout. The point
                  of using Lorem Ipsum is that it has a more-or-less normal
                  distribution of letters, as opposed to using 'Content here, content
                  here', making it look like readable English..
                </p>
                <p class="text-justify ml-5">
                  It is a long established fact that a reader will be distracted by
                  the readable content of a page when looking at its layout. The point
                  of using Lorem Ipsum is that it has a more-or-less normal
                  distribution of letters, as opposed to using 'Content here, content
                  here', making it look like.
                </p>
              </div>
            </div>
            <a href="<?php echo HOME_PATH.'search.php'.'?category_name=triplex'; ?>" class="btn btn-primary">See All Flats</a>
          </div>
      </section>
      <section class="footer">
        <div class="footer-main-content">
          <div class="group-members">
            <h3>Team Members</h3>
            <p>Joy Mojumdar</p>
            <p>Md. Ashikuzzaman</p>
            <p>Sabiha Akter</p>
          </div>
          <div class="contact">
            <h3>Contact</h3>
            <p><i class="far fa-envelope"></i> joymojumdar1074@gmail.com</p>
            <p><i class="far fa-envelope"></i> ashk11534@gmail.com</p>
            <p><i class="far fa-envelope"></i> sabihaakter07800@gmail.com</p>
          </div>
        </div>
        <p>saj@gmail.com&copy;All rights reserved.</p>
      </section>
</body>
</html>