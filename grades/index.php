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
              <a class="navbar-brand">Grades</a>
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
                    <a class="nav-link" href="../courses/index.php">Courses</a>
                  </li>
                </ul>
              </div>
            </nav>
            <div class="row">

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Course description</th>
                      <th>Subject</th>
                      <th>Grade</th>
                      <th>Marks</th>
                      <th>Semester</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include '../db.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT std.firstname,std.lastname, c.name as coursename, s.name as subname , ssg.grade, ssg.mark, ssg.semester from student std, course c, subjects s, student_subject_grade ssg where std.student_id = ssg.student_id and c.course_id = ssg.course_id and s.subject_id = ssg.ssg_id';
                   
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['firstname'] . " ". $row['lastname']. '</td>';
                            echo '<td>'. $row['coursename'] . '</td>';
                            echo '<td>'. $row['subname'] . '</td>';
                            echo '<td>'. $row['grade'] . '</td>';
                            echo '<td>'. $row['mark'] . '</td>';
                            echo '<td>'. $row['semester'] . '</td>';
                            echo '<td width=250>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="students/update.php?id='.$row['student_id'].'">Update</a>';
                            echo ' ';
                            echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->

  </body>
</html>