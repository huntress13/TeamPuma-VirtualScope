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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles/loginpage-style.css">
  <link rel="stylesheet" href="styles/navbar-style.css">
</head>
<body>

<!-- Navigation Bar -->
<?php include 'navbar.php'; ?>

<!-- Login Form -->
<div id="logintop-jumbotron" class="jumbotron-fluid jumbotron bg-cover">
  <div class="overlay"></div>
  <div class="container">
    <h1 class="display-3 mb-1">Log In</h1>
    <p class="lead"><span>Log into your account</span></p>
  </div>
</div>

<div class="container" style="margin-top:50px">
  <div class="row justify-content-center">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
      <div id="login-jumbotron" class ="jumbotron" style="border-radius: 15px;">
          <form id="login-form" method="POST" action="includes/login.inc.php" class="needs-validation" novalidate>
          <label for="uname">Username:</label>  
          <div class="input-group mb-3">
              <div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
              <input type="text" class="form-control" id="uname" placeholder="Type your username" name="username" required>
              <div class="invalid-feedback">Please fill out this field.</div>
          </div>
            <label for="pwd">Password:</label>
            <div class="input-group mb-2">
              <div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
              <input type="password" class="form-control" id="pwd" placeholder="Type your password" name="pwd" required>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <button type="submit" class="btn" name="login-submit">Submit</button>
          </form>
          <div class="container text-right">
          Dont have an account? <a href="signup.php">Sign up here!</a>
          </div>
      </div>
    </div>
  </div>  
</div>

<!-- Footer -->
<?php include 'footer.php' ?>

</body>
</html>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>