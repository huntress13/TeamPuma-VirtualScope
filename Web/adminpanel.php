<?php
  require 'includes/sessionsconfig.inc.php';

  if($userType != "admin"){
    header("Location: index.php");
  }
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
  <link rel="stylesheet" href="styles/adminpage-style.css">
</head>

<body>
<!-- Navigation Bar -->
<?php include 'navbar.php'; ?>

<!-- Content -->
<div class="container" style="margin-top:30px">
  <div class="card" style="margin-bottom:30px">
    <div class="card-header">
        Administrator Panel
        <a href="index.php" style="float: right;">Back to home</a>
    </div>

    <div class="card-body">
        <div class="container">
          <dl class="row">
            <dt class="col-sm-3"><button type="submit" class="btn" name="classpasswords"  onclick="window.location.href='classpasswordpage.php'">Class Passwords</button></dt>
            <dd class="col-sm-9 my-auto">View and modify class passwords</dd>
          
            <dt class="col-sm-3"><button type="submit" class="btn" name="userlogins"  onclick="window.location.href='tracklogin.php'">Logins</button></dt>
            <dd class="col-sm-9 my-auto">
              Track user logins
            </dd>
          
            <dt class="col-sm-3"><button type="submit" class="btn" name="configuremicroscopes"  onclick="window.location.href='microscopeconfig.php'">Microscopes</button></dt>
            <dd class="col-sm-9 my-auto">View and configure microscopes</dd>
          </dl>
        </div>
    </div>
  </div>
</div>

</body>

</html>



