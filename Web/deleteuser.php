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
        Delete User Account
        <a href="adminpanel.php" style="float: right;">Back to admin panel</a>
    </div>

  <div class="card-body">
    <div class="container">

<!-- Seach by StarID -->
 <div class="container" style="margin-bottom:10px">
      <h5> Delete by First and Last Name</h5>
        <form id="delete-user" class="form-inline" action="deleteuser.php" method="post">
        <div class="form-group">
          <input type="text" name = "firstName" placeholder="First Name" class="form-control" />
          <input type="text" name = "lastName" placeholder="Last Name" class="form-control" />
        </div>
        <div class="form-group">
          <button class="btn" name="delete-submit" type="submit" class="form-control" >Delete</button>
        </div>
        </form>
</div>

<!--Display search result if searched-->
<?php

//Begin if
if (isset($_POST['delete-submit'])) {
    include "includes/dbh.inc.php";
    ?>

<div class="card" style="margin-bottom:30px">

        <div class="card-header">
            Deleted Result
        </div>

        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
                    <?php
                    	//fetch info from admin
                    	$first = $_POST['firstName'];
                      $last = $_POST['lastName'];
                      // sql to delete a record

                      if(empty($first) || empty($last)){
                        echo "Missing first and or last name. Please fill in all fields and try again.";
                      }else{
                        $sql = "DELETE FROM users WHERE first_name ='$first' and last_name = '$last'";
                        if ($conn->query($sql) === TRUE) {
                          echo "Record deleted successfully";
                        } else {
                          echo "Error deleting record: " . $conn->error;
                        }
                      }
                        // Close connection
                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
     //End if statement
    } ?>

    <div class="card" style="margin-bottom:30px">
    <div class="card-header">
        VirtualScope User Accounts

    </div>

    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                <?php include "includes/dbh.inc.php";
                    $sql = "SELECT first_name, last_name, star_id, user_type FROM users
                               ORDER BY first_name;";
                    //$i = 0;
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                echo "<table class=\"table table-striped text-center\">";
                                    echo "<tr>";
                                        echo "<th class=\"text-center\">First Name</th>";
                                        echo "<th class=\"text-center\">Last name</th>";
                                        echo "<th class=\"text-center\">StarID</th>";
                                        echo "<th class=\"text-center\">User Type</th>";
                                    echo "</tr>";
                                while($row = mysqli_fetch_array($result)){

                                        echo "<tr>";
                                            echo "<td>" . $row['first_name'] . "</td>";
                                            echo "<td>" . $row['last_name'] . "</td>";
                                            echo "<td>" . $row['star_id'] . "</td>";
                                            echo "<td>" . $row['user_type'] . "</td>";
                                        echo "</tr>";
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

                    // Close connection
                    mysqli_close($conn);
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
