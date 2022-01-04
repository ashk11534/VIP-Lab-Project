<?php include('tenant/includes/db_connect.php'); ?>
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
    <link rel="stylesheet" href="css/about.css">
    <title>About Us</title>
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
            <a class="navbar-brand" href="<?php echo HOME_PATH; ?>?id=<?php echo $_SESSION['id']; ?>&name=<?php echo $_SESSION['name']; ?>">
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
      <section class="about-us">
        <div class="overlay d-flex justify-content-center align-items-center">
          <div>
            <h1 class="font-weight-bold">About Us</h1>
          </div>
        </div>
      </section>
      <section class="company-overview">
        <h1 class="text-center">Company</h1>
        <hr />
        <nav class="navbar d-flex justify-content-center mt-4">
          <form class="form-inline">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <button class="btn text-uppercase font-weight-bold overview-button">Overview</button>
                </div>
                <div class="carousel-item">
                  <button class="btn text-uppercase font-weight-bold team-button">Team</button>
                </div>
              </div>
            </div>
          </form>
        </nav>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
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
                      here', making it look like readable English.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <section class="team">
                <div class="container">
                  <div class="row">
                    <div class="col-4">
                      <div class="card">
                        <img src="images/joy.jpg" class="card-img-top" alt="..." style="height: 347px;">
                        <div class="card-body">
                          <h5 class="card-title">Joy Mojumdar</h5>
                          <p class="card-text"><i class="fas fa-phone-alt"></i> 01733-563820</p>
                          <p><i class="far fa-envelope"></i> joymojumdar1074@gmail.com</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="card">
                        <img src="images/ashik.jpg" class="card-img-top" alt="..." style="height: 347px;">
                        <div class="card-body">
                          <h5 class="card-title">Md. Ashikuzzaman</h5>
                          <p class="card-text"><i class="fas fa-phone-alt"></i> 01932-629230</p>
                          <p><i class="far fa-envelope"></i> ashk11534@gmail.com</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="card">
                        <img src="images/sabiha.jpg" class="card-img-top" alt="..." style="height: 347px;">
                        <div class="card-body">
                          <h5 class="card-title">Sabiha Akter</h5>
                          <p class="card-text"><i class="fas fa-phone-alt"></i> 01984-546619</p>
                          <p><i class="far fa-envelope"></i> sabihaakter07800@gmail.com</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>