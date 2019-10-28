<?php
  require 'includes/sessionsconfig.php';

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
  <link rel="stylesheet" href="styles/scopeconfig-style.css">
  <link rel="stylesheet" href="styles/navbar-style.css">
</head>
<body>

<!-- Navigation -->
<?php include 'navbar.php' ?>

<!-- Content -->
<div class="container" style="margin-top:30px">
    <div class="card" style="margin-bottom:30px">

        <div class="card-header">
            Microscope Configurations
            <a href="adminpanel.php" style="float: right;">Back to admin panel</a>
        </div>

        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
                    <?php include "includes/dbh.inc.php";
                        $sql = "SELECT * FROM microscopes";
                        $i = 0;
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                    echo "<table class=\"table table-striped\">";
                                        echo "<tr>";
                                            echo "<th class=\"text-center\" width=\"10%\">ID</th>";
                                            echo "<th class=\"text-center\">Microscope name</th>";
                                            echo "<th class=\"text-center\">Experiment name</th>";
                                            echo "<th class=\"text-center\">Course name</th>";
                                            echo "<th class=\"text-center\">Availability</th>";
                                            echo "<th class=\"text-center\">Photo Interval</th>";
                                            echo "<th class=\"text-center\">State</th>";
                                            echo "<th class=\"text-center\">Edit</th>";
                                        echo "</tr>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<form id=\"microscope-form". $i++ ."\" method=\"POST\" action=\"includes/updatescope.inc.php\" class=\"form-horizontal\">";
                                            echo "<tr>";
                                                echo "<td><input type=\"text\" class=\"form-control\" value=\"" . $row['mid'] . "\" name=\"mid\" readonly></td>";
                                                echo "<td><input type=\"text\" class=\"form-control\" value=\"" . $row['microscope_name'] . "\" name=\"microscope_name\"></td>";
                                                echo "<td><input type=\"text\" class=\"form-control\" value=\"" . $row['experiment_name'] . "\" name=\"experiment_name\"></td>";
                                                echo "<td><input type=\"text\" class=\"form-control\" value=\"" . $row['course_name'] . "\" name=\"course_name\"></td>";
                                                echo "<td><input type=\"text\" class=\"form-control\" value=\"" . $row['availability'] . "\" name=\"availability\"></td>";
                                                echo "<td><input type=\"text\" class=\"form-control\" value=\"" . $row['picture_time_increment'] . "\" name=\"picture_time_increment\"></td>";
                                                
                                                if($row['state'] == 'active'){
                                                    echo "<td><select class=\"form-control\" name=\"state\">
                                                            <option value=\"active\" selected=\"selected\">Active</option>
                                                            <option value=\"inactive\">Inactive</option>
                                                        </select></td>";
                                                }
                                                else if($row['state'] == 'inactive'){
                                                    echo "<td><select class=\"form-control\" name=\"state\">
                                                            <option value=\"active\">Active</option>
                                                            <option value=\"inactive\" selected=\"selected\">Inactive</option>
                                                         </select></td>";
                                                }
                                                else{
                                                    echo "<td><select class=\"form-control\" name=\"state\">
                                                            <option value=\"active\">Active</option>
                                                            <option value=\"inactive\" selected=\"selected\">Inactive</option>
                                                            </select></td>";
                                                }
                                                
                                                echo "<td><button type=\"submit\" class=\"btn\" name=\"updatescope-submit\">Submit</button></td>";
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
