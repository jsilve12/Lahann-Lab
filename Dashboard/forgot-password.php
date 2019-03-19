<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
  <?php
    $pass = "";
    session_start();
    include("../functions.php");
    if(loggedIn($_SESSION) == 2)
    {
      header("Location: login.php");
      exit();
    }

    # If the password is to be updated
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
      # Makes sure the passwords are the same
      if($_POST['Password'] === $_POST['Confirm_Password'])
      {
        # Make sure no one tries to change someone elses password
        $per = $pdo->prepare("Select person_id from person where email = :email");
        $per->execute(array(
          "email" => $_POST['email']
        ));
        $perEmail = $per->fetch()['person_id'];
        if($perEmail !== $_SESSION['username'])
        {
          header("Location: forgot-password.php");
          exit();
        }

        # Update the password
        $upd = $pdo->prepare("Update person set password = :pass where person_id = :person");
        $upd->execute(array(
          "pass" => password_hash($_POST['Password'], PASSWORD_DEFAULT),
          "person" => $_SESSION['username']
        ));
        $pass = "Password Reset";
      }
      else
      {
        $pass = "The passwords are different: They were not reset";
      }
    }
  ?>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <form method = "POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="email" id="email" class="form-control" placeholder="Email Address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email Address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="Password" id="Password" class="form-control" required="required" autofocus="autofocus">
              <label for="Password">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="Confirm Password" id="Confirm Password" class="form-control" required="required" autofocus="autofocus">
              <label for="Confirm Password">Confirm Password</label>
            </div>
          </div>
          <div class="form-group">
            <div>
              <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" required="required" autofocus="autofocus">
            </div>
          </div>
        </form>
        <div class="text-center">
          <a class="d-block small" href="login.php">Login Page</a>
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
