<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
    </head>
 
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand">Courses</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="../index.php">Students</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../subjects/index.php">Subjects</a>
                  </li><li class="nav-item">
                    <a class="nav-link" href="../grades/index.php">Grades</a>
                  </li>
                </ul>
              </div>
            </nav>
            <div class="row">
              <p>
                    <a href="create.php" class="btn btn-success">Add Course</a>
                </p>

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                    <th>Courses ID</th>
                      <th>Description</th>
                      <th>Total Credits</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include '../db.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM course ORDER BY course_id ASC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['course_id'] . '</td>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['total_credits'] . '</td>';
                            echo '<td width=250>';                            
                            echo '<a class="btn btn-info" href="read.php?id='.$row['course_id'].'">View</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="students/update.php?id='.$row['course_id'].'">Update</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="students/delete.php?id='.$row['course_id'].'">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
        </div>
    </div> <!-- /container -->
  </body>
</html>