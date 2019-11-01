<?php
  require 'includes/sessionsconfig.inc.php';
  if($userType != "admin"){
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>VirtualScope</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles/tracklogin-style.css">
  <link rel="stylesheet" href="styles/navbar-style.css">
</head>
<body>

<!-- Navigation -->
<?php include 'navbar.php' ?>

<!-- Content -->
<div class="container" style="margin-top:30px">
    <div class="card" style="margin-bottom:30px">

        <div class="card-header">
            Student Login History
            <a href="adminpanel.php" style="float: right;">Back to admin panel</a>
        </div>

        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
                    <?php include "includes/dbh.inc.php";
                        $sql = "SELECT first_name, last_name, star_id, timestamp FROM logins, users
                                   WHERE logins.uid = users.uid ORDER BY timestamp DESC;";
                        $i = 0;
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                    echo "<table class=\"table table-striped\">";
                                        echo "<tr>";
                                            echo "<th class=\"text-center\">First Name</th>";
                                            echo "<th class=\"text-center\">Last name</th>";
                                            echo "<th class=\"text-center\">StarID</th>";
                                            echo "<th class=\"text-center\">Last Login Timestamp</th>";
                                        echo "</tr>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<form id=\"microscope-form". $i++ ."\" method=\"POST\" action=\"includes/updatescope.inc.php\" class=\"form-horizontal\">";
                                            echo "<tr>";
                                                echo "<td><input type=\"text\" class=\"form-control\" value=\"" . $row['first_name'] . "\" name=\"first_name\" readonly></td>";
                                                echo "<td><input type=\"text\" class=\"form-control\" value=\"" . $row['last_name'] . "\" name=\"last_name\" readonly></td>";
                                                echo "<td><input type=\"text\" class=\"form-control\" value=\"" . $row['star_id'] . "\" name=\"star_id\" readonly></td>";
                                                echo "<td><input type=\"text\" class=\"form-control\" value=\"" . $row['timestamp'] . "\" name=\"timestamp\" readonly></td>";

                                              //echo "<td><button type=\"submit\" class=\"btn\" name=\"updatescope-submit\">Submit</button></td>";
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

                        // Close connection
                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
