<?php
     
    require '../db.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $firstnameError = null;
        $lastnameError = null;
        $dobError = null;
        $syError = null;
         
        // keep track post values
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $sy_enrolled = $_POST['sy_enrolled'];
         
        // validate input
        $valid = true;
        if (empty($firstname)) {
            $nameError = 'Please enter first name';
            $valid = false;
        }
        if (empty($lastname)) {
            $nameError = 'Please enter last name';
            $valid = false;
        }
         
        if (empty($dob)) {
            $breedError = 'Please enter date of birth';
            $valid = false;
        }

        if (empty($sy_enrolled)) {
            $breedError = 'Please enter year enrolled';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO student (firstname,lastname,dob,sy_enrolled) values(? , ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($firstname,$lastname,$dob,$sy_enrolled));
            Database::disconnect();
            header("Location: ../index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Add a student</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
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
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="../index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
