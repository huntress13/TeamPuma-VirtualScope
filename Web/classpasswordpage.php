<?php
  require 'includes/sessionsconfig.inc.php';

  if($userType != "admin"){
    header("Location: index.php");
  }
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
  <link rel="stylesheet" href="styles/scopeconfig-style.css">
  <link rel="stylesheet" href="styles/navbar-style.css">
</head>

<body>
<!-- Navigation Bar -->
<?php include 'navbar.php'; ?>

<div class="row justify-content-center">
 <h1>Class Password</h1>
</div>

<!-- Modify class password -->
 <div class="container" style="margin-top:1px">
  <div class="row justify-content-center">
    <div id="login-jumbotron" class ="jumbotron" style="border-radius: 5px;">
      <span style="text-align: center"><h4>Modify/Add Class Password</h4><br/></span>
      <form class="form-classpassword" action="includes/classpassword.inc.php"
      method="post">

      <div class = "form_group">
        <input type="text" name = "course_name" placeholder="Course Name" class="form__input" />
        <input type="text" name = "section" placeholder="Section" class="form__input" />
        <input type="text" name = "class_password" placeholder="Class Password" class="form__input" />
      </div>
      <button class="btn" name="classpassword-submit" type="submit">Submit</button><br>
      </form>
    </div>
  </div>
</div>


<!-- DISPLAY class password -->
 <div class="container" style="margin-top:20px">
  <!-- Title -->
  <div class = "card">
  <div class="card-header">Class Password List
  </div>

  <div class="card-body">
    <div class="container">
      <div class="row">
        <div class="table-responsive">
          <?php include "includes/dbh.inc.php";
          $sql = "SELECT course_name, section, class_password FROM class_passwords ORDER BY cpid DESC;";
          $i = 0;
          if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
              echo "<table class=\"table table-striped text-center\">";
                echo "<tr>";
                 echo "<th class=\"text-center\">Course Name</th>";
                 echo "<th class=\"text-center\">Section</th>";
                 echo "<th class=\"text-center\">Class Password</th>";
                echo "</tr>";
              while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                 echo "<td>" . $row['course_name'] . "</td>";
                 echo "<td>" . $row['section'] . "</td>";
                 echo "<td>" . $row['class_password'] . "</td>";
                echo "</tr>";
              }
            echo "</table>";
            mysqli_free_result($result);
          } else{
            echo "no class passwords exists with your query";
          }

         } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
          }
          mysqli_close($conn);
          ?>
      </div>
    </div>
  </div>
</div>
</div>

</div>

<!-- partial -->
  <script  src="./script.js"></script>
  
</body>
</html>

