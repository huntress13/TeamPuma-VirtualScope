<?php
  require 'includes/sessionsconfig.inc.php';
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>VirtualScope</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles/signuppage-style.css">
  <link rel="stylesheet" href="styles/navbar-style.css">
</head>
<body>

<!-- Navigation -->
<?php include 'navbar.php' ?>

<!-- Content -->
<div id="signup-jumbotron" class="jumbotron-fluid jumbotron bg-cover">
  <div class="overlay"></div>
  <div class="container">
    <h1 class="display-3 mb-1">Sign Up!</h1>
    <p class="lead"><span>Create a VirtualScope account</span></p>
  </div>
</div>

<div class="container" style="margin-top:30px">
<div class ="row justify-content-center">
<div class="col-xs-12 col-md-6">
    <form class="form-signup" action="includes/signup.inc.php" method="post">
      <div class="form__group">
              <input type="text" name = "firstname" placeholder="First Name" class="form__input" />
              <input type="text" name = "lastname" placeholder="Last Name" class="form__input" />
              <input type="text" name = "starid" placeholder="StarId" class="form__input" />
              <input type="password" name="classpwd" placeholder="Class Password" class="form__input" />
              <input type="text" name = "uid" placeholder="Username" class="form__input" />
              <input type="password" name = "pwd" placeholder="Password" class="form__input" />
              <input type="Password" name = "pwd-repeat" placeholder="Repeat Password" class="form__input" />
        </div>
              <button class="btn" name = "signup-submit" type="submit">Submit</button><br>
    </form>
</div>
</div>
</div>

<!-- Footer -->
<?php include 'footer.php' ?>

</body>
</html>
