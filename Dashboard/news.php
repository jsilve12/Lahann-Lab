<?php
session_start();
include("head.php");
include("../functions.php");
if(loggedIn($_SESSION) == 2)
{
  header("Location: login.php");
  exit();
}
if($_SESSION['authorization'] < 2)
{
  header("Location: index.php");
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

  <title>Users Page</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Users Table</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Key</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Images</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Key</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Images</th>
                    <th>Edit</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                    # Function for selector
                    function indCheck($arr, $ind, $val)
                    {
                      return (isset($arr[$ind]) ? ($arr[$ind] == $val)? "selected": "" : "");
                    }

                    $news = $pdo->prepare("Select pk, title, author, contents from news order by pk");
                    $news->execute();
                    $news = $news->fetchall();
                    foreach($news as $user)
                    {
                      # Gets all the images
                      $img = $pdo->prepare("Select * from images where art = :a");
                      $img->execute(array(
                        "a" => $user['pk']
                      ));
                      $img = $img->fetchall();

                      # Echos each row
                      echo(" <tr>
                                <td>".$user['pk']."</td>
                                <td id = '".$user['pk']."title'>".$user['title']."</td>
                                <td id = '".$user['pk']."author'>".$user['author']."</td>
                                <td id = '".$user['pk']."contents'>".$user['contents']."</td>
                                <td id = '".$user['pk']."images'>");
                      # Displays the image
                      foreach($img as $val)
                      {
                        echo("<img style='width:80%;margin:10%;' src=../".$val["name"].">");
                        echo("<button style='width:100%;margin-bottom:2%' onclick=imgDelete(".$val['pk'].")>-</button>");
                      }
                      # Allows a new image to be uploaded
                      echo("
                        <div class='col-xl-3 col-sm-6 mb-3'>
                          <form action='imgupdate.php?type=2&key=".$user['pk']."' method='post' enctype='multipart/form-data'>
                            Upload a new image (Note: to view the new image, refresh)
                            </br>
                            <input type='file' name='fileToUpload' id='fileToUpload'>
                            <input type='hidden' name='person_id' id='person_id' value='".$_SESSION['username']."'>
                            <input type='submit' value='Upload Image' name='submit'>
                          </form>
                        </div>");
                      echo("</td>
                                <td><button id = 'submit' value = '".$user['pk']."' onclick = newsEditFunc(".$user['pk'].")>Edit</button></td>
                              </tr>");
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
</body>
</html>
