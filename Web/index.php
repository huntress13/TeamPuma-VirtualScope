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
  <link rel="stylesheet" href="styles/homepage-style.css">
  <link rel="stylesheet" href="styles/navbar-style.css">
</head>
<body>

<!-- Navigation Bar -->
<?php include 'navbarnolink.php'; ?>

<div id="home-jumbotron" class="jumbotron-fluid jumbotron bg-cover">
  <div class="overlay"></div>
  <div class="container">
    <h1 class="display-3 mb-1">VirtualScope</h1>


    <p class="lead"><span>Where your experiments come to you.</span></p>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      Hello World!
    </div>
    <div class="col-md-4">
      Hello World 2!
    </div>
  </div>
</div>

</body>
</html>
