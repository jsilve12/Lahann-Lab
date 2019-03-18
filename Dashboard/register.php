<!DOCTYPE html>
<?php
  # You can only create an account, if you are logged in
  session_start();
  include("../functions.php");
  if(loggedIn($_SESSION) == 1)
  {
    # Must have atleast an admin level of authorization
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION['authorization'] > 1)
    {

      # Deals with the password
      $pass = password_hash($_POST['password1'], PASSWORD_DEFAULT);

      $ins = $pdo->prepare("Insert Into
              person(name, experience, `power`, email, password, department, location, years, mentor, photo)
              values(:name, :experience, :power, :email, :password, :department, :location, :years, :mentor, :photo)");
      $ins->execute(array(
        ":name" => $_POST['name'],
        ":experience" => $_POST['experience'],
        ":power" => $_POST['power'],
        ":email" => $_POST['email'],
        ":password" => $pass,
        ":department" => $_POST['department'],
        ":location" => $_POST['location'],
        ":years" => $_POST['years'],
        ":mentor" => $_POST['mentor']
      ));

      # Uploads the image
      $id = $ins->lastInsertId();
      imgSave($id, $pdo);
    }
  }
  else
  {
    header("Location: login.php");
    exit();
  }
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="name" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
              <label for="name">Name</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" class="form-control" placeholder="Email address" required="required">
              <label for="email">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password1" class="form-control" placeholder="password" required="required">
              <label for="password1">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="power">Experience</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <select id="power" class="form-control" required="required">
                    <option value = 9>Alumni Post Doc</option>
                    <option value = 8>Alumni Ph.D.</option>
                    <option value = 7>Alumni Masters</option>
                    <option value = 6>Alumni Visiting</option>
                    <option value = 5>Alumni Undergraduate</option>
                    <option value = 4>Professor</option>
                    <option value = 3>Post Doc</option>
                    <option value = 2>Graduate Student</option>
                    <option value = 1>Visiting Scholar</option>
                    <option value = 0>Undergraduate</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="power">Authorization Level</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <select id="power" class="form-control" required="required">
                    <option>3</option>
                    <option>2</option>
                    <option>1</option>
                    <option>0</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="department" class="form-control" placeholder="Department" required="required">
              <label for="department">Department</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="location" class="form-control" placeholder="Location" required="required">
              <label for="location">Location</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="years" class="form-control" placeholder="Years" required="required">
              <label for="years">Years</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="mentor" class="form-control" placeholder="Mentor" required="required">
              <label for="mentor">Mentor</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="file" id="picture" class="form-control" placeholder="Picture" required="required">
              <label for="picture">Picture</label>
            </div>
          </div>
          <div class="form-group">
            <div>
              <input type="submit" id="submit" class="btn btn-primary btn-block">
            </div>
          </div>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.html">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
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
