<?php
  session_start();
  include("../functions.php");
  if(loggedIn($_SESSION) == 2)
  {
    header("Location: login.php");
    exit();
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
    <?php
      include("head.php");
    ?>
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
          $user = $pdo->prepare("Select name, email, department, location, years, mentor, photo, Education, Research, Research_Experience, Awards, Resume from person where person_id = :pk");
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
                          <form action='imgupdate.php?type=1' method='post' enctype='multipart/form-data'>
                            Upload a new image (Note: to view the new image, refresh)
                            </br>
                            <input type='file' name='fileToUpload' id='fileToUpload'>
                            <input type='hidden' name='person_id' id='person_id' value='".$_SESSION['username']."'>
                            <input type='submit' value='Upload Image' name='submit'>
                          </form>
                        </div>
                      </div>");
              }
              else if($key == "Resume")
              {
                echo("<div class='row'>
                        <div class='col-xl-3 col-sm-6 mb-3'>".
                          $key.": <div id = '".$key."'>".$value."</div>
                        </div>
                        <div class='col-xl-3 col-sm-6 mb-3'>
                          <form action='resupdate.php?type=1' method='post' enctype='multipart/form-data'>
                            Upload a new Resume
                            </br>
                            <input type='file' name='ResumeToUpload' id='ResumeToUpload'>
                            <input type='hidden' name='person_id' id='person_id' value='".$_SESSION['username']."'>
                            <input type='submit' value='Upload Resume' name='submit'>
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

</body>

</html>
