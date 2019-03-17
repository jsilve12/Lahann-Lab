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
                    <th>Name</th>
                    <th>Experience</th>
                    <th>Authorization</th>
                    <th>Email</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Experience</th>
                    <th>Authorization</th>
                    <th>Email</th>
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

                    $users = $pdo->prepare("Select person_id, name, experience, power, email from person");
                    $users->execute();
                    $users = $users->fetchall();
                    foreach($users as $user)
                    {
                      echo(" <tr>
                                <td id = '".$user['person_id']."name'>".$user['name']."</td>
                                <td>
                                  <select id = '".$user['person_id']."experience' disabled>
                                    <option value = '9' ".indCheck($user, "experience", 9).">Post Doc Alumni</option>
                                    <option value = '8' ".indCheck($user, "experience", 8).">Alumni Ph.D.</option>
                                    <option value = '7' ".indCheck($user, "experience", 7).">Alumni Masters</option>
                                    <option value = '6' ".indCheck($user, "experience", 6).">Alumni Visiting Scholar</option>
                                    <option value = '5' ".indCheck($user, "experience", 5).">Alumni Undergraduate</option>
                                    <option value = '4' ".indCheck($user, "experience", 4).">Professor</option>
                                    <option value = '3' ".indCheck($user, "experience", 3).">Post Doctoral</option>
                                    <option value = '2' ".indCheck($user, "experience", 2).">Graduate Student</option>
                                    <option value = '1' ".indCheck($user, "experience", 1).">Visiting Scholar</option>
                                    <option value = '0' ".indCheck($user, "experience", 0).">Undergraduate</option>
                                  </select>
                                </td>
                                <td>
                                  <select id = '".$user['person_id']."power' disabled>
                                    <option value = '3' ".indCheck($user, "power", 3).">3</option>
                                    <option value = '2' ".indCheck($user, "power", 2).">2</option>
                                    <option value = '1' ".indCheck($user, "power", 1).">1</option>
                                    <option value = '0' ".indCheck($user, "power", 0).">0</option>
                                  </select>
                                </td>
                                <td id = '".$user['person_id']."email'>".(isset($user['email']) ? $user['email'] : "None")."</td>
                                <td><button id = 'submit' value = '".$user['person_id']."' onclick = bigEditFunc(".$user['person_id'].")>Edit</button></td>
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
