<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    </head>
 
<body>
    <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="#">Students</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="courses/index.php">Courses</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="subjects/index.php">Subjects</a>
                  </li><li class="nav-item">
                    <a class="nav-link" href="grades/index.php">Grades</a>
                  </li>
                </ul>
              </div>
            </nav>

            <div class="row">
              <p>
                    <!-- <a href="students/create copy.php" class="btn btn-success">Add Student</a> -->
                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#newStudentForm">Add Student</a>
                </p>

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                    <th>Student ID</th>
                      <th>Name</th>
                      <th>DOB</th>
                      <th>School Year</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'db.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM student ORDER BY student_id ASC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['student_id'] . '</td>';
                            echo '<td>'. $row['firstname'] . " ". $row['lastname']. '</td>';
                            echo '<td>'. $row['dob'] . '</td>';
                            echo '<td>'. $row['sy_enrolled'] . '</td>';
                            echo '<td width=250>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="students/update.php?id='.$row['student_id'].'">Update</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="students/delete.php?id='.$row['student_id'].'">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->


    <!-- Modal -->
    <div class="modal fade" id="newStudentForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Add Student</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="post">
              <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                  <label class="control-label">Name</label>
                  <div class="controls">
                      <input name="name" type="text"  placeholder="First Name" value="<?php echo !empty($firstname)?$firstname:'';?>">
                      <?php if (!empty($nameError)): ?>
                          <span class="help-inline"><?php echo $nameError;?></span>
                      <?php endif; ?>

                      <input name="name" type="text"  placeholder="Last Name" value="<?php echo !empty($lastname)?$lastname:'';?>">
                      <?php if (!empty($nameError)): ?>
                          <span class="help-inline"><?php echo $nameError;?></span>
                      <?php endif; ?>
                  </div>
              </div>
              <div class="control-group <?php echo !empty($breedError)?'error':'';?>">
                <label class="control-label">Breed</label>
                <div class="controls">
                    <input name="breed" type="text" placeholder="Dog breed" value="<?php echo !empty($breed)?$breed:'';?>">
                    <?php if (!empty($breedError)): ?>
                        <span class="help-inline"><?php echo $breedError;?></span>
                    <?php endif;?>
                </div>
              </div>
              <br>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    
  </body>
</html>