<?php
  require 'includes/sessionsconfig.inc.php';
  require 'includes/dbh.inc.php';

  if($userType != "admin"){
    header("Location: index.php");
  }

  
  if(!isset($_POST['editscope-submit'])){
    header("Location: microscopeconfig.php");
  } else{
    $scopeID = $_POST['mid'];

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
            <a href="microscopeconfig.php" style="float: right;">Back to microscopes</a>
        </div>

        <div class="card-body">
            <div class="container">
                    <?php 
                        $sql = "SELECT * FROM microscopes WHERE mid = ?";
                        $stmt = mysqli_stmt_init($conn);
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_bind_param($stmt, "s", $scopeID);
                        mysqli_stmt_execute($stmt);
                        if(mysqli_stmt_bind_result($stmt, $col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8)){
                                mysqli_stmt_fetch($stmt);
                                $microscopeName = $col2; //Define the microscope name
                                $experimentName = $col3; //Define the experiment name
                                $courseName = $col4; // Define the course name
                                $availability = $col5; // Define the availability
                                $photoInterval = $col6; // Define the photo interval
                                $state = $col8; // Define the state
                                
                                // Close the statement
                                mysqli_stmt_close($stmt);
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                        
                        // Close connection
                        mysqli_close($conn);


                        //FORM
                        echo '<h2>'. ucfirst($microscopeName) .'</h2>';
                        echo'   <form id="scope-edit-form" method="POST" action="includes/updatescope.inc.php" class="needs-validation" novalidate>
                                    <input type="hidden" id="microscopeID" name="mid" value="'. $scopeID . '">
                                    <input type="hidden" id="microscope_name" name="microscope_name" value="'. $microscopeName .'">
                                    <label for="experimentName">Experiment Name:</label>  
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="experimentName" value="'. $experimentName .'" name="experiment_name" required>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <label for="courseName">Course Name:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="courseName" value="'. $courseName .'" name="course_name" required>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                     </div>
                                    <label for="pwd">Availability:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="availability" value="'. $availability .'" name="availability" required>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <label for="pwd">Photo Interval:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="picture_time_increment" value="'. $photoInterval .'" name="picture_time_increment" required>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <label for="pwd">State:</label>';
                                    
                                    if($state == 'active'){
                                        echo "<select class=\"form-control\" name=\"state\">
                                                <option value=\"active\" selected=\"selected\">Active</option>
                                                <option value=\"inactive\">Inactive</option>
                                            </select>";
                                    }
                                    else if($state == 'inactive'){
                                        echo "<select class=\"form-control\" name=\"state\">
                                                <option value=\"active\">Active</option>
                                                <option value=\"inactive\" selected=\"selected\">Inactive</option>
                                             </select>";
                                    }
                                    else{
                                        echo "<select class=\"form-control\" name=\"state\">
                                                <option value=\"active\">Active</option>
                                                <option value=\"inactive\" selected=\"selected\">Inactive</option>
                                                </select>";
                                    }

                                    echo '<br/>';
                                    echo '<button type="submit" class="btn" name="updatescope-submit">Submit</button>
                                </form>';
                        ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
