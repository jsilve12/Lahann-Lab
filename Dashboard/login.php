<?php
  session_start();

  if(isset($_SESSION['username']))
  {
    unset($_SESSION['username']);
  }
  include("../functions.php");
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $users = $pdo->prepare("Select * from person where email = :email");
    $users->execute(array('email'=> $_POST['email']));
    $users = $users->fetchall();

    # Redirects if needed
    if(sizeof($users) && password_verify($_POST['password'], $users[0]["password"]) && $users[0]["experience"] < 5)
    {
      $_SESSION["username"] = $users[0]["person_id"];
      $_SESSION["authorization"] = $users[0]["power"];
      header("Location: index.php");
      exit();
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method='post'>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name = "email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name = "password" id="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <input class = "btn btn-primary btn-block" type="submit" value="Login">
        </form>
        <div class="text-center">
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
