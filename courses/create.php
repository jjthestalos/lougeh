<?php
     
    require '../db.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $creditsError = null;
        $coursenameError = null;
        $mobileError = null;
         
        // keep track post values
        $name = $_POST['name'];
        $total_credits = $_POST['total_credits'];
         
        // validate input
        $valid = true;
        if (empty($name)) {
            $coursenameError = 'Please enter course name';
            $valid = false;
        }
         
        if (empty($breed)) {
            $creditsError = 'Please enter total course credits';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO course (name,total_credits) values(?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$breed));
            Database::disconnect();
            header("Location: index.php");
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
                        <h3>Add a course</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($coursenameError)?'error':'';?>">
                        <label class="control-label">Course Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Course" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($coursenameError)): ?>
                                <span class="help-inline"><?php echo $coursenameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($creditsError)?'error':'';?>">
                        <label class="control-label">Total Credits</label>
                        <div class="controls">
                            <input name="breed" type="text" placeholder="Total credits" value="<?php echo !empty($total_credits)?$total_credits:'';?>">
                            <?php if (!empty($creditsError)): ?>
                                <span class="help-inline"><?php echo $creditsError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <br>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Add</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
