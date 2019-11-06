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

<div id="splash-jumbotron" class="jumbotron-fluid jumbotron bg-cover">
  <div class="overlay"></div>
  <div class="container">
    <h1 class="display-3 mb-1">VirtualScope</h1>


    <p class="lead"><span>Where your experiments come to you.</span></p>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h2>What is VirtualScope?</h2>
      <p>VirtualScope is your gateway to accessing Biological experiments from anywhere!
         Here we have a sample being viewed using either a 10x, 40x, or 100x oil objective on our microscope coming to you
          through the internet via a Raspberry Pi. Experiments often require a test case as well as a control which means 
          we are capable of viewing multiple microscopes at the same time which may be receiving different treatments.
           To learn more about these see our current list of what each scope is viewing, <a href="homepage.php">click here!</a></p>
    </div>
    <div class="col-md-6">
      <div class="videoWrapper">
              <!-- Put YOUTUBE link below -->
              <iframe width="560" height="349" src="https://www.youtube.com/embed/JY_0kaKBtJ4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
      </div>
  </div>
</div>

<!-- Footer -->
<?php include 'footer.php' ?>

</body>
</html>
