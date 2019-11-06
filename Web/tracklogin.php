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
        VirtualScope User Login History
        <a href="adminpanel.php" style="float: right;">Back to admin panel</a>
    </div>

  <div class="card-body">
    <div class="container">

<!-- Seach by StarID -->
 <div class="container" style="margin-top:1px">
      <h5>Search by StarID</h5>
        <form id="search-login" class="form-inline" action="tracklogin.php" method="post">
        <div class="form-group">
          <input type="text" name = "star_ID" placeholder="StarID" class="form__input" />
        </div>
        <div class="form-group">
          <button class="btn" name="search-submit" type="submit" class="form__input" >Search</button>
        </div>
        </form>
</div>
<!--Display search result-->
<div class="card" style="margin-bottom:30px">

        <div class="card-header">
            Search Result
        </div>

        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
                    <?php include "includes/dbh.inc.php";

                      if (isset($_POST['search-submit'])) {
                    	//fetch info from admin
                    	$starID = $_POST['star_ID'];
                        $sql = "SELECT first_name, last_name, star_id, user_type, timestamp FROM logins, users
                                   WHERE logins.uid = users.uid
                                   AND users.star_id ='$starID'
                                   ORDER BY timestamp DESC";
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                    echo "<table class=\"table table-striped text-center\">";
                                        echo "<tr>";
                                            echo "<th class=\"text-center\">First Name</th>";
                                            echo "<th class=\"text-center\">Last name</th>";
                                            echo "<th class=\"text-center\">StarID</th>";
                                            echo "<th class=\"text-center\">User Type</th>";
                                            echo "<th class=\"text-center\">Timestamp</th>";
                                        echo "</tr>";
                                    while($row = mysqli_fetch_array($result)){

                                            echo "<tr>";
                                                echo "<td>" . $row['first_name'] . "</td>";
                                                echo "<td>" . $row['last_name'] . "</td>";
                                                echo "<td>" . $row['star_id'] . "</td>";
                                                echo "<td>" . $row['user_type'] . "</td>";
                                                echo "<td>" . $row['timestamp'] . "</td>";
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


                      }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card" style="margin-bottom:30px">
    <div class="card-header">
        VirtualScope Login History

    </div>

    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                <?php include "includes/dbh.inc.php";
                    $sql = "SELECT first_name, last_name, star_id, user_type, timestamp FROM logins, users
                               WHERE logins.uid = users.uid ORDER BY timestamp DESC;";
                    //$i = 0;
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                echo "<table class=\"table table-striped text-center\">";
                                    echo "<tr>";
                                        echo "<th class=\"text-center\">First Name</th>";
                                        echo "<th class=\"text-center\">Last name</th>";
                                        echo "<th class=\"text-center\">StarID</th>";
                                        echo "<th class=\"text-center\">User Type</th>";
                                        echo "<th class=\"text-center\">Timestamp</th>";
                                    echo "</tr>";
                                while($row = mysqli_fetch_array($result)){

                                        echo "<tr>";
                                            echo "<td>" . $row['first_name'] . "</td>";
                                            echo "<td>" . $row['last_name'] . "</td>";
                                            echo "<td>" . $row['star_id'] . "</td>";
                                            echo "<td>" . $row['user_type'] . "</td>";
                                            echo "<td>" . $row['timestamp'] . "</td>";
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
