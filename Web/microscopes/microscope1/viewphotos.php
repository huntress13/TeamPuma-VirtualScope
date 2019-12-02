<?php
  require '../../includes/sessionsconfig.inc.php';
  require '../../includes/functions.inc.php';

  if(!$loggedIn){
    header("Location: ../../loginpage.php");
  }
  //Get microscope name
  $microscopeName = getMyMicroscopeName(dirname(__FILE__));


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>VirtualScope</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../styles/photopage-style.css">
  <link rel="stylesheet" href="../../styles/navbar-style.css">
</head>
<body>

<!-- Navigation -->
<?php include '../../navbar.php' ?>

<!-- Content -->
<div class="container" style="margin-top:30px">
    <div class="card" style="margin-bottom:30px">

        <div class="card-header">
            Images from <?php echo ucfirst($microscopeName) ?><span style="float: right;">
            <a href="./viewlivestream.php">View the stream</a><br/>
            <?php
                if($userType == 'admin'){
                    echo 'Admin Only: ';
                    echo '<form class="form-inline" id="clear-photos" method="POST" action="../../includes/clearphotos.inc.php">
                            <input type="hidden" id="clear" name="clear" value="clear">
                            <input type="hidden" id="'.$microscopeName.'" name="'.$microscopeName.'" value="'.$microscopeName.'">
                            <button type="submit" name="clearphotos-submit">ClearPhotos</button>
                        </form>';
                }
            ?>
            </span>
        </div>

        <div class="card-body">
            <div class="container">
                <div class="row justify-content-center">
                    <?php
                        displayImages('./images');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include '../../footer.php' ?>

</body>
</html>
