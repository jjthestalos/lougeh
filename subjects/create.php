<?php
     
    require '../db.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $breedError = null;
        $mobileError = null;
         
        // keep track post values
        $name = $_POST['name'];
        $breed = $_POST['breed'];
         
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter dog name';
            $valid = false;
        }
         
        if (empty($breed)) {
            $breedError = 'Please enter dog breed';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO dog (name,breed) values(?, ?)";
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
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Add a dog</h3>
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
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
