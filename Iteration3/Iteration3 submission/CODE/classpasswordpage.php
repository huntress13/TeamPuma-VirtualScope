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

<div class="container" style="margin-top:30px">
  <div class="card" style="margin-bottom:30px">
    <div class="card-header">
        Class Passwords
        <a href="adminpanel.php" style="float: right;">Back to admin panel</a>
    </div>

  <div class="card-body">
    <div class="container">

<!-- Add class password -->
 <div class="container" style="margin-top:1px">
      <h5>Add Class Password</h5>
        <form id="add-password" class="form-inline" action="includes/classpassword.inc.php" method="post">
        <div class="form-group">
          <input type="text" name = "course_name" placeholder="Course Name" class="form__input" />
        </div>
        <div class="form-group">
          <input type="text" name = "section" placeholder="Section" class="form__input" />
        </div>
        <div class="form-group">
          <input type="text" name = "class_password" placeholder="Class Password" class="form__input" />
        </div>
        <div class="form-group">
          <button class="btn" name="addcpwd-submit" type="submit" class="form__input" >Submit</button>
        </div>
        </form>
</div>
<!--Delete class password-->
<div class="card" style="margin-bottom:30px">

        <div class="card-header">
            Existing Class Passwords
        </div>

        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
                    <?php include "includes/dbh.inc.php";
                        $sql = "SELECT * FROM class_passwords";
                        $i = 0;
                        if($result = mysqli_query($conn, $sql)){
                            $numberOfRows = mysqli_num_rows($result);
                            if(mysqli_num_rows($result) > 0){
                                    echo "<table class=\"table table-striped text-center\">";
                                        echo "<tr>";
                                            echo "<th class=\"text-center\">ID</th>";
                                            echo "<th class=\"text-center\">Course name</th>";
                                            echo "<th class=\"text-center\">Section</th>";
                                            echo "<th class=\"text-center\">Class Password</th>";;
                                            echo "<th class=\"text-center\"></th>";
                                        echo "</tr>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<form id=\"classpassword-form". $i++ ."\" method=\"POST\" action=\"includes/deleteclasspassword.inc.php\" class=\"form-horizontal\">";
                                            echo '<input type="hidden" id="classpasswordID" name="cpid" value="'. $row['cpid'] . '">';
                                            echo "<tr>";
                                                echo "<td>" . $row['cpid'] . "</td>";
                                                echo "<td>" . $row['course_name'] . "</td>";
                                                echo "<td>" . $row['section'] . "</td>";
                                                echo "<td>" . $row['class_password'] . "</td>";
                                                
                                                
                                                echo "<td><button type=\"submit\" class=\"btn\" name=\"deletecpwd-submit\">delete</button></td>";
                                            echo "</tr>";
                                        echo "</form>";
                                    
                                }
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "No records matching your query were found.";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>

</body>
</html>

