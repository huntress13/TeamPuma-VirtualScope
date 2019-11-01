<?php
  //require 'includes/sessionsconfig.php';
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
<?php include 'yernavbar.php'; ?>
<div class="row justify-content-center">
 <h1>Administrator Page</h1>
</div>

 <div class="container" style="margin-top:15px">
  <div class="row justify-content-center">
    <div id="login-jumbotron" class ="jumbotron" style="border-radius: 15px;">
     <div class="links">
   <ul>
    <ul>
      <button onclick="window.location.href = 'viewlivestream.php'">Previous Projects</button>
    </ul>
       <ul>
      <button onclick="window.location.href = 'loginpage.php'">Current Projects</button>
    </ul>
       <ul>
      <button onclick="window.location.href = 'viewlivestream.php'">Microscope Configurations</button>
    </ul>
       <ul>
      <button onclick="window.location.href = 'viewlivestream.php'">View Logins</button>
    </ul>
       <ul>
      <button onclick="window.location.href = 'viewlivestream.php'">Edit Class Passwords</button>
    </ul>

   </ul>
 </div>

  </div>
</div>
</div>



</body>
</html>

