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
                      echo(" <tr>
                                <td>".$user['pk']."</td>
                                <td id = '".$user['pk']."title'>".$user['title']."</td>
                                <td id = '".$user['pk']."author'>".$user['author']."</td>
                                <td id = '".$user['pk']."contents'>".$user['contents']."</td>
                                <td id = '".$user['pk']."images'></td>
                                <td><button id = 'submit' value = '".$user['pk']."' onclick = bigEditFunc(".$user['pk'].")>Edit</button></td>
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