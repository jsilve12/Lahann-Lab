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
              papers(title, abstract, link, Project, Author)
              values(:title, :abstract, :link, :Project, :Author)");
      $ins->execute(array(
        "title" => $_POST['title'],
        "abstract" => $_POST['Abstract'],
        "link" => $_POST['link'],
        "Project" => $_POST['topic'],
        "Author" => $_POST['author']
      ));

      # Uploads the image
      $id = $pdo->lastInsertId();
      imgSave($id, $pdo, 3);
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
      <div class="card-header">Post a New Paper</div>
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
              <input type="text" name="link" id="link" class="form-control" placeholder="link" required="required" autofocus="autofocus">
              <label for="link">Link</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="author" id="author" class="form-control" placeholder="author" required="required" autofocus="autofocus">
              <label for="author">Author</label>
              If you separate all the author's names by comma's, and match it to their name in the database, it will show up on their page.
            </div>
          </div>
          <div class="form-group">
            <label for="Abstract">Abstract</label>
            <div class="form-label-group">
              <textarea type="text" name="Abstract" id="Abstract" class="form-control" rows=5 required="required" autofocus="autofocus"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" placeholder="Picture">
              <label for="picture">Picture</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="topic">Topic</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <select name="topic" id="topic" class="form-control" required="required">
                    <option value = 1>Reactive Polymeric Coatings</option>
                    <option value = 2>Molecule Synthesis</option>
                    <option value = 3>Co-Jetting of Particles and Fibers</option>
                  </select>
                </div>
              </div>
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
