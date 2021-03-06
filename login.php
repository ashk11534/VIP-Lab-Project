<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script
    src="https://kit.fontawesome.com/97727431b8.js"
    crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h1 class="text-center">Login</h1>
     <hr>
    <section class="main-form d-flex justify-content-center">
      <form class="form-content w-25" >
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="inputPassword2" class="visually-hidden">Password</label>
            <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
    </section>
</body>
</html>