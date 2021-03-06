<?php
  # You can only create an account, if you are logged in
  session_start();
  include("../functions.php");
  if(loggedIn($_SESSION) == 1 && $_SESSION['authorization'] > 1)
  {
    # Must have atleast an admin level of authorization
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
      # Inserts the values
      $ins = $pdo->prepare("Insert Into
              news(title, dat, author, contents)
              values(:title, :dat, :author, :contents)");
      $ins->execute(array(
        "title" => $_POST['title'],
        "dat" => $_POST['date'],
        "author" => $_POST['author'],
        "contents" => $_POST['Contents']
      ));

      # Uploads the image
      $id = $pdo->lastInsertId();
      imgSave($id, $pdo, 2);
    }
  }
  else
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
  <?php
    include("head.php");
  ?>
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Post a News Article</div>
      <div class="card-body">
        <form method = "POST" name = "Form" id = "Form" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="title" id="title" class="form-control" placeholder="title" required="required" autofocus="autofocus">
              <label for="title">Title</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="date" id="date" class="form-control" placeholder="date" required="required" autofocus="autofocus">
              <label for="date">Date</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="author" id="author" class="form-control" placeholder="author" required="required" autofocus="autofocus">
              <label for="author">Author</label>
            </div>
          </div>
          <div class="form-group">
            <label for="Contents">Contents</label>
            <div class="form-label-group">
              <textarea type="text" name="Contents" id="Contents" class="form-control" rows=5 required="required" autofocus="autofocus"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" placeholder="Picture">
              <label for="picture">Picture</label>
            </div>
          </div>
          <div class="form-group">
            <div>
              <input type="submit" id="submit" class="btn btn-primary btn-block">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
