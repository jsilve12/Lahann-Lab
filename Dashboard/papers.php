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
                    <th>People Connected</th>
                    <th>Abstract</th>
                    <th>Type</th>
                    <th>Images</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Key</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>People Connected</th>
                    <th>Abstract</th>
                    <th>Type</th>
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

                    $news = $pdo->prepare("Select * from papers order by paper_id desc");
                    $news->execute();
                    $news = $news->fetchall();
                    foreach($news as $user)
                    {
                      # Gets each person
                      $pep = $pdo->prepare("Select * from people_papers where paper_id = :paper");
                      $pep->execute(array(
                        "paper" => $user['paper_id']
                      ));
                      $pep = $pep->fetchall();


                      # Echos each row
                      echo(" <tr>
                                <td>".$user['paper_id']."</td>
                                <td id = '".$user['paper_id']."title'>".$user['title']."</td>
                                <td id = '".$user['paper_id']."Author'>".$user['Author']."</td>
                                <td id = '".$user["paper_id"]."Connected'>");
                      # Echos the Connected people
                      foreach($pep as $people)
                      {
                        $name = $pdo->prepare("Select name from person where person_id = :person");
                        $name->execute(array(
                          "person" => $people["person_id"]
                        ));
                        $name = $name->fetchall();
                        echo($name[0]["name"]."</br>
                            <button onclick=\"editFunc('".$user['paper_id']."Connected', ".$people["person_id"]." ,".$people["paper_id"].", 'true',3)\">-</button></br>");
                      }

                      # Add new people
                      echo("
                        Add a new Author
                        <form>
                          <input type='text' id = ".$user['paper_id']."person>
                          <input type='submit' onclick = 'addPaperPerson(".$user['paper_id'].")'>
                        </form>
                        <div id = Result></div>
                      ");

                      echo("</td>
                                <td id = '".$user['paper_id']."abstract'>".$user['abstract']."</td>
                                <td>
                                  <select id = '".$user['paper_id']."Category' disabled>
                                    <option value = '1' ".indCheck($user, "Project", 1).">Reactive Polymeric Coatings</option>
									<option value = '2' ".indCheck($user, "Project", 2).">Molecule Synthesis</option>
                                    <option value = '3' ".indCheck($user, "Project", 3).">Co-Jetting of Particles and Fibers</option>
                                  </select>
                                </td>
                                <td id = '".$user['paper_id']."images'>
                                  <img style='width:80%;margin:10%;' src=../".$user["Image"].">
                                ");
                      # Allows a new image to be uploaded
                      echo("
                        <div class='col-xl-3 col-sm-6 mb-3'>
                          <form action='imgupdate.php?type=3&key=".$user['paper_id']."' method='post' enctype='multipart/form-data'>
                            Upload a new image (Note: to view the new image, refresh)
                            </br>
                            <input type='file' name='fileToUpload' id='fileToUpload'>
                            <input type='hidden' name='person_id' id='person_id' value='".$_SESSION['username']."'>
                            <input type='submit' value='Upload Image' name='submit'>
                          </form>
                        </div>");
                      echo("</td>
                                <td><button id = 'submit' value = '".$user['paper_id']."' onclick = paperEditFunc(".$user['paper_id'].")>Edit</button></td>
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
