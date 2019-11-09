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
                            $numberOfRows = mysqli_num_rows($result);
                            if(mysqli_num_rows($result) > 0){
                                    echo "<table class=\"table table-striped text-center\">";
                                        echo "<tr>";
                                            echo "<th class=\"text-center\">Microscope name</th>";
                                            echo "<th class=\"text-center\">Experiment name</th>";
                                            echo "<th class=\"text-center\">Course name</th>";
                                            echo "<th class=\"text-center\">Availability</th>";
                                            echo "<th class=\"text-center\">Photo Interval</th>";
                                            echo "<th class=\"text-center\">State</th>";
                                            echo "<th class=\"text-center\"></th>";
                                        echo "</tr>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<form id=\"microscope-form". $i++ ."\" method=\"POST\" action=\"editmicroscope.php\" class=\"form-horizontal\">";
                                            echo '<input type="hidden" id="microscopeID" name="mid" value="'. $row['mid'] . '">';
                                            echo "<tr>";
                                                echo "<td>" . $row['microscope_name'] . "</td>";
                                                echo "<td>" . $row['experiment_name'] . "</td>";
                                                echo "<td>" . $row['course_name'] . "</td>";
                                                echo "<td>" . $row['availability'] . "</td>";
                                                echo "<td>" . $row['picture_time_increment'] . "</td>";
                                                echo "<td>" . $row['state'] . "</td>";
                                                
                                                
                                                echo "<td><button type=\"submit\" class=\"btn\" name=\"editscope-submit\">Edit</button></td>";
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
                    <form id="add-microscope" method="POST" action="includes/addscope.inc.php">
                        <input type="hidden" id="nextNumber" name="next_microscope_number" value="<?php echo ++$numberOfRows ?>">
                        <button type="submit" class="btn" name="addscope-submit">Add Microscope</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
    // Close connection
    mysqli_close($conn);
?>

</body>
</html>
