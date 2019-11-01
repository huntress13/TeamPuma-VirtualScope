<?php
  //require 'includes/sessionsconfig.php';
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


<body>
<!-- Navigation Bar -->
<?php include 'yernavbar.php'; ?>
<div class="row justify-content-center">
 <h1>Class Password Page</h1>
</div>

 <div class="container" style="margin-top:1px">
  <div class="row justify-content-center">
    <div id="login-jumbotron" class ="jumbotron" style="border-radius: 5px;">
      <span style="text-align: center"><h4>Modify/Add Class Password</h4><br/></span>
      <form class="form-classpassword" action="includes/classpassword.inc.php"
      method="post">

      <div class = "form_group">
        <input type="text" name = "classname" placeholder="Class Name" class="form__input" />
        <input type="text" name = "sectionnumber" placeholder="Section Number" class="form__input" />
        <input type="text" name = "classpassword" placeholder="Class Password" class="form__input" />
      </div>
      <button class="btn" name="classpassword-submit" type="submit">Submit</button><br>
      </form>

    </div>
  </div>
</div>

 <div class="container" style="margin-top:1px">
  <div class="row justify-content-center">
    <div id="login-jumbotron" class ="jumbotron" style="border-radius: 5px;">
      <h4>Class Passwords List</h4>
     

    </div>
  </div>
</div>



</body>
</html>

