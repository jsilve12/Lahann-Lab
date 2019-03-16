<!DOCTYPE html>
<?php
  session_start();
  include("../functions.php");
  if(loggedIn($_SESSION) == 2)
  {
    header("Location: login.php");
    exit();
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $users = $pdo->prepare("Select * from users where email = ".$_POST['inputEmail']);
    $users->execute();

    # TODO: Figure out what needs to get updated
  }
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lahann Lab Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <script type = "text/javascript">

  </script>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Lahann Lab Dashboard</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Information Screens:</h6>
          <a class="dropdown-item" href="news.php">News</a>
          <a class="dropdown-item" href="users.php">Users</a>
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.php">Login</a>
          <a class="dropdown-item" href="register.php">Register</a>
          <a class="dropdown-item" href="forgot-password.php">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="../">Return to Lahann Lab</a>
        </div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"> Update Personal Information</li>
        </ol>
        <!-- Icon Cards-->
        <?php
          # Gets the users information
          $user = $pdo->prepare("Select name, email, department, location, years, mentor, photo, Education, Research, Research_Experience, Awards from person where person_id = :pk");
          $user->execute(array("pk" => $_SESSION['username']));
          $user = $user->fetchall();

          # Iterate over the columns
          $val = 1;
          foreach($user[0] as $key => $value)
          {
            if($val === 1)
            {
              if($key == "photo")
              {
                echo("<div class='row'>
                        <div class='col-xl-3 col-sm-6 mb-3'>".
                          $key.": <img id = '".$key."' src = '../images/".$value."'/>
                        </div>
                        <div class='col-xl-3 col-sm-6 mb-3'>
                          <form action='imgupdate.php' method='post' enctype='multipart/form-data'>
                            Upload a new image (Note: to view the new image, refresh)
                            </br>
                            <input type='file' name='fileToUpload' id='fileToUpload'>
                            <input type='hidden' name='person_id' id='person_id' value='".$_SESSION['username']."'>
                            <input type='submit' value='Upload Image' name='submit'>
                          </form>
                        </div>
                      </div>");
              }
              else
              {
                echo("<div class='row'>
                        <div class='col-xl-3 col-sm-6 mb-3'>".
                          $key.": <div id = '".$key."'>".$value."</div>
                        </div>
                        <div>
                          <button onclick=\"editFunc('".$key."', ".$_SESSION['username'].")\">Edit</button>
                        </div>
                      </div>");
              }
              $val = 2;
            }
            else
            {
              $val = 1;
            }
          }
        ?>
        </div>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Lahann Lab</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

  <script>
    function editFunc(key, numb)
    {
      if(document.getElementById(key).contentEditable === "true")
      {
        console.log("Sending");
        url = "update.php?k=";

        //Add the get parameters
        url = url.concat(key);
        url = url.concat("&v=");
        url = url.concat(document.getElementById(key).innerHTML);
        url = url.concat("&pk=");
        url = url.concat(numb);
        console.log(url);

        //Actually interact with JSON
    	fetch(url)
    	  .then((response) =>{
            if (!response.ok) throw Error(response.statusText);
            console.log(response);
            return response.json();
          })
          .then((data) => {
            console.log(data);
          })
        document.getElementById(key).contentEditable = false;
      }
      else
      {
        console.log("Editing");
        document.getElementById(key).contentEditable = true;
      }
    }
  </script>

</body>

</html>
