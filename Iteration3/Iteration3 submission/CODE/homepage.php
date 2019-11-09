<?php
  require 'includes/sessionsconfig.inc.php';
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <title>VirtualScope</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/homepage-style.css">
  <link rel="stylesheet" href="styles/navbar-style.css">
</head>
<body>

<!-- Navigation Bar -->
<?php include 'navbar.php'; ?>

<div id="home-jumbotron" class="jumbotron-fluid jumbotron bg-cover">
  <div class="overlay"></div>
  <div class="container">
    <h1 class="display-3 mb-1">Ongoing Experiments</h1>
    <p class="lead"><span>What we're doing today</span></p>
  </div>
</div>

<div class="container text-center">
  <h1>Today's BIG Question...</h1>
  <p>What type of protist are paramecium? This lab experiment is for you to understand their anatomy.
</p>
  <div class="row  justify-content-center">
    <div class="col-sm-8 col-md-4">
      <div class="card">
        <div class="card-header">Microscope 1</div>
        <div class="card-body">
          <img class="img-thumbnail img-fluid" src="<?php echo $homepath ?>images/paramecium.jpg" style="width:100%">
            Experiment Group 1
          <a href="microscopes/microscope1/viewlivestream.php" class="btn btn-info" role="button">View Live Stream</a>
          <a href="microscopes/microscope1/viewphotos.php" class="btn btn-info" role="button">View Photos</a>
        </div>
      </div>
    </div>
    <div class="col-sm-8 col-md-4">
      <div class="card">
        <div class="card-header">Microscope 2</div>
        <div class="card-body">
          <img class="img-thumbnail img-fluid" src="<?php echo $homepath ?>images/paramecium2.jpg" style="width:100%">
            Experiment Group 2
          <a href="microscopes/microscope2/viewlivestream.php" class="btn btn-info" role="button">View Live Stream</a>
          <a href="microscopes/microscope2/viewphotos.php" class="btn btn-info" role="button">View Photos</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<?php include 'footer.php' ?>


</body>
</html>
