<?php 
  include('tenant/includes/db_connect.php');
  if(isset($_GET['id'])){
    $_SESSION['id'] = $_GET['id'];
  }
  if(isset($_GET['name'])){
    $_SESSION['name'] = $_GET['name'];
  } 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script
      src="https://kit.fontawesome.com/97727431b8.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css" />
  </head>
  <body>
    <!-- top navbar starts -->
    <section class="secondary-nav">
      <ul>
        <div class="left-items">
          <li><a href="<?php echo TENANT_PATH.'login.php'; ?>">Login</a></li>
          <li><a href="<?php echo TENANT_PATH.'signup.php'; ?>">Register</a></li>
        </div>
        <div class="push"></div>
        <div class="right-items">
          <li>saj@gmail.com</li>
          <li>+8801932-629230</li>
        </div>
      </ul>
    </section>
    <!-- top navbar ends -->
    <!-- bottom navbar starts -->
    <section class="main-nav">
      <ul>
        <div class="logo">
          <a class="navbar-brand" href="<?php echo HOME_PATH; ?>?id=<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>&name=<?php if(isset($_GET['name'])){echo $_GET['name'];} ?>">
            <img src="images/logo.png" style="width: 80px;" class="rounded-circle" alt="logo">
          </a>
        </div>
        <div class="push"></div>
        <div class="nav-items">
          <a href=""><li>Home</li></a>
          <a href="<?php echo HOME_PATH.'category.php'; ?>"><li>Category</li></a>
          <a href="about.php"><li>About</li></a>
          <a href="<?php echo HOME_PATH.'flat.php'; ?>?id=<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>"><li>Flat</li></a>
          <a href="#contact-us"><li>Contact</li></a>
          <?php
            if(isset($_GET['id'])){
              ?>
              <a href="<?php echo HOME_PATH.'dashboard.php'; ?>?id=<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>&name=<?php if(isset($_GET['name'])){echo $_GET['name'];}?>"><li>Dashboard</li></a>
              <form action="" method="POST">
                <button class="btn btn-danger" type="submit" name="submit">Logout</button>
              </form>
              <?php
            }
            else{
              ?>
              <a href="<?php echo TENANT_PATH.'login.php'; ?>"><li>Login</li></a>
              <?php
            }
          ?>
          <?php
            if(isset($_POST['submit'])){
              unset($_GET['name'], $_GET['id'], $_SESSION['id'], $_SESSION['name']);
              header('location:'. HOME_PATH);
            }
          ?>
        </div>
      </ul>
    </section>
<!-- bottom navbar ends -->
<!-- welcome section starts -->
    <section class="welcome">
      <div class="overlay">
        <h1>Welcome To Our Site</h1>
        <div class="main-form">
          <form action="" method="POST">
            <input type="hidden" name="tenant_id" value="<?php
              if(isset($_GET['id'])){
                echo $_GET['id'];
              }
              else{
                echo 0;
              }
            ?>">
            <input
              type="text"
              name="search-category"
              placeholder="Search by category"
            />
            <input type="submit" name="submit" value="SEARCH" />
          </form>
        </div>
      </div>
    </section>
    <?php
      if(isset($_POST['submit'])){
        $category_name = $_POST['search-category'];
        $tenant_id = $_POST['tenant_id'];
        header('location:'.HOME_PATH.'search.php'.'?tenant_id='.$tenant_id.'&category_name='.$category_name);
      }
    ?>
<!-- welcome section ends -->
<!-- category section starts -->
    <section class="category">
      <div class="div-1">
        <div class="overlay">
          <h2>Dining room</h2>
        </div>
      </div>
      <div class="div-2">
        <div class="overlay">
          <h2>Bed room</h2>
        </div>
      </div>
      <div class="div-3">
        <div class="overlay">
          <h2>Kitchen room</h2>
        </div>
      </div>
      <div class="div-4">
        <div class="overlay">
          <h2>Study room</h2>
        </div>
      </div>
    </section>
    <section class="recent-rents">
      <h1>Recent Rents</h1>
      <hr />
      <div class="rents">
        <?php
          $sql = "SELECT * FROM flat WHERE tenant_id IS NOT NULL ORDER BY flat_price DESC LIMIT 3";
          $res = mysqli_query($conn, $sql);
          if($res == TRUE){
              $count = mysqli_num_rows($res);
              if($count > 0){
                while($row=mysqli_fetch_assoc($res)){
                  $flat_name = $row['flat_name'];
                  $flat_image = $row['flat_image'];
                  $flat_description = $row['flat_description'];
                  $rent = $row['flat_price'];
                  $flat_area = $row['flat_area'];
                  $bedrooms = $row['number_of_bedrooms'];
                  $bathrooms = $row['number_of_bathrooms'];
                  ?>
                  <div class="rent-1">
                    <img src="admin/images/flat_images/<?php echo $flat_image; ?>" alt="" style="height:16.5rem;"/>
                    <h2><?php echo $flat_name; ?></h2>
                    <h4><?php echo $rent; ?> tk./month</h4>
                    <ul>
                      <li><?php echo $flat_area; ?>sq ft</li>
                      <li>|</li>
                      <li><?php echo $bedrooms; ?> bedrooms</li>
                      <li>|</li>
                      <li><?php echo $bathrooms; ?> bathrooms</li>
                    </ul>
                    <p class="text-justify">
                      <?php echo $flat_description; ?>
                    </p>
                  </div>
                  <?php
                }
              }
          }
        ?>
    </section>
    <!-- category section ends -->
    <!-- contact section starts -->
    <section class="get-in-touch" id="contact-us">
      <div class="overlay">
        <h1>Get In Touch</h1>
        <hr />
        <form action="" method="POST">
          <div class="div-1">
            <input type="text" name="first_name" placeholder="First name" />
            <input type="text" name="last_name" placeholder="Last name" />
          </div>
          <div class="div-2">
            <input type="text" name="phone" placeholder="Phone" />
            <input type="text" name="email" placeholder="E-mail" />
          </div>
          <div class="div-3">
            <textarea
              name="message"
              cols="30"
              rows="10"
              placeholder="Write your message here..."
            ></textarea>
          </div>
          <input type="submit" name="send_button" value="SEND MESSAGE" />
        </form>
      </div>
    </section>
    <!-- contact section ends -->
    <!-- footer section starts -->
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
    <!-- footer section ends -->
  </body>
</html>
