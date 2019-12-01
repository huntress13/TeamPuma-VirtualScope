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
 <div class="container" style="margin-bottom:10px">
        <!-- <form id="search-login" class="form-inline" action="tracklogin.php" method="post">
        <div class="form-group">
          <input type="text" name = "star_ID" placeholder="StarID" class="form-control" />
        </div>
        <div class="form-group">
          <button class="btn" name="search-submit" type="submit" class="form-control" >Search</button>
        </div>
        </form> -->

        <!-- Tab links -->
        <h6>Click on the tabs below to search by a desire criteria</h6>
        <div class="tab">
          <button class="tablinks" onclick="openTab(event, 'Name')">Name</button>
          <button class="tablinks" onclick="openTab(event, 'Date Range')">Date Range</button>
          <button class="tablinks" onclick="openTab(event, 'List All')">List All</button>
        </div>

        <!-- Tab content -->
        <div id="Name" class="tabcontent">
          <h3>Name</h3>
          <p>See user's login history by first and last name</p>
          <form id="search-name" class="form-inline" action="tracklogin.php" method="post">
          <div class="form-group">
            <input type="text" name = "firstName" placeholder="First Name" class="form-control" />
            <input type="text" name = "lastName" placeholder="Last Name" class="form-control" />
          </div>
          <div class="form-group">
            <button class="btn" name="search-name" type="submit" class="form-control" >Search</button>
          </div>
          </form>
        </div>

        <div id="Date Range" class="tabcontent">
          <h3>Date Range</h3>
          <p>See ALL users' login history by date range in the format of MM/DD/YYYY</p>
          <form id="search-date-all" class="form-inline" action="tracklogin.php" method="post">
          <div class="form-group">
            <input type="text" name = "allStartDate" placeholder="Start Date" class="form-control" />
            <input type="text" name = "allEndDate" placeholder="End Date" class="form-control" />
          </div>
          <div class="form-group">
            <button class="btn" name="search-date-all" type="submit" class="form-control" >Search All</button>
          </div>
        </form>
          <br>
          <br>
          <p>See ONE user's login history by date range in the format of MM/DD/YYYY</p>
          <form id="search-date-one" class="form-inline" action="tracklogin.php" method="post">
          <div class="form-group">
            <input type="text" name = "dateFirstName" placeholder="First Name" class="form-control" />
            <input type="text" name = "dateLastName" placeholder="Last Name" class="form-control" />
            <input type="text" name = "oneStartDate" placeholder="Start Date" class="form-control" />
            <input type="text" name = "oneEndDate" placeholder="End Date" class="form-control" />
          </div>
          <div class="form-group">
            <button class="btn" name="search-date-one" type="submit" class="form-control" >Search One</button>
          </div>
          </form>
        </div>

        <div id="List All" class="tabcontent">
          <h3>List All</h3>
          <p>See all user login history</p>
          <form id="search-all" class="form-inline" action="tracklogin.php" method="post">
            <div class = "form-group">
            <button class="btn" name="search-all" type="submit" class="form-control" >Search</button>
          </div>
          </div>
          </form>
        </div>
</div>

<?php if(isset($_POST['search-all']) ||isset($_POST['search-name']) || isset($_POST['search-date-one']) || isset($_POST['search-date-all'])){
  include "includes/dbh.inc.php";
?>

<div class="card" style="margin-bottom:30px">

        <div class="card-header">
            Search Result
        </div>

        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
                    <?php
                    	//fetch info from admin
                    	if(isset($_POST['search-all'])){
                        $sql = "SELECT first_name, last_name, star_id, username, user_type, timestamp FROM logins, users
                                   WHERE logins.uid = users.uid
                                   ORDER BY timestamp DESC;";
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                    echo "<table class=\"table table-striped text-center\">";
                                        echo "<tr>";
                                            echo "<th class=\"text-center\">First Name</th>";
                                            echo "<th class=\"text-center\">Last name</th>";
                                            echo "<th class=\"text-center\">StarID</th>";
                                            echo "<th class=\"text-center\">Username</th>";
                                            echo "<th class=\"text-center\">User Type</th>";
                                            echo "<th class=\"text-center\">Timestamp</th>";
                                        echo "</tr>";
                                    while($row = mysqli_fetch_array($result)){

                                            echo "<tr>";
                                                echo "<td>" . $row['first_name'] . "</td>";
                                                echo "<td>" . $row['last_name'] . "</td>";
                                                echo "<td>" . $row['star_id'] . "</td>";
                                                echo "<td>" . $row['username'] . "</td>";
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

                      if(isset($_POST['search-name'])){
                        $first = $_POST['firstName'];
                        $last = $_POST['lastName'];
                        if(empty($first)||empty($last)){
                          echo "Missing first and or last name. Please fill in all fields and try again.";
                        } else{
                          $sql = "SELECT first_name, last_name, star_id, username, user_type, timestamp FROM logins, users
                                     WHERE logins.uid = users.uid
                                     AND users.first_name = '$first'
                                     AND users.last_name = '$last'
                                     ORDER BY timestamp DESC;";
                          if($result = mysqli_query($conn, $sql)){
                              if(mysqli_num_rows($result) > 0){
                                      echo "<table class=\"table table-striped text-center\">";
                                          echo "<tr>";
                                              echo "<th class=\"text-center\">First Name</th>";
                                              echo "<th class=\"text-center\">Last name</th>";
                                              echo "<th class=\"text-center\">StarID</th>";
                                              echo "<th class=\"text-center\">Username</th>";
                                              echo "<th class=\"text-center\">User Type</th>";
                                              echo "<th class=\"text-center\">Timestamp</th>";
                                          echo "</tr>";
                                      while($row = mysqli_fetch_array($result)){
                                              echo "<tr>";
                                                  echo "<td>" . $row['first_name'] . "</td>";
                                                  echo "<td>" . $row['last_name'] . "</td>";
                                                  echo "<td>" . $row['star_id'] . "</td>";
                                                  echo "<td>" . $row['username'] . "</td>";
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
                        }
                        // Close connection
                        mysqli_close($conn);
                      }


                      if(isset($_POST['search-date-all'])){
                        $start = $_POST['allStartDate'];
                        $end = $_POST['allEndDate'];
                        if(empty($start) || empty($end)){
                          echo "Missing information. Please fill in all fields and try again.";
                        } else{
                          $sql = "SELECT first_name, last_name, star_id, username, user_type, timestamp FROM logins, users
                                     WHERE logins.uid = users.uid
                                     AND DATE_FORMAT(timestamp, '%m/%d/%Y') >= '$start'
									                   AND DATE_FORMAT(timestamp,'%m/%d/%Y') <= '$end'
                                     ORDER BY timestamp DESC;";
                          if($result = mysqli_query($conn, $sql)){
                              if(mysqli_num_rows($result) > 0){
                                      echo "<table class=\"table table-striped text-center\">";
                                          echo "<tr>";
                                              echo "<th class=\"text-center\">First Name</th>";
                                              echo "<th class=\"text-center\">Last Name</th>";
                                              echo "<th class=\"text-center\">StarID</th>";
                                              echo "<th class=\"text-center\">Username</th>";
                                              echo "<th class=\"text-center\">User Type</th>";
                                              echo "<th class=\"text-center\">Timestamp</th>";
                                          echo "</tr>";
                                      while($row = mysqli_fetch_array($result)){
                                              echo "<tr>";
                                                  echo "<td>" . $row['first_name'] . "</td>";
                                                  echo "<td>" . $row['last_name'] . "</td>";
                                                  echo "<td>" . $row['star_id'] . "</td>";
                                                  echo "<td>" . $row['username'] . "</td>";
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
                        }
                        // Close connection
                        mysqli_close($conn);
                      }

                      if(isset($_POST['search-date-one'])){
                        $first = $_POST['dateFirstName'];
                        $last = $_POST['dateLastName'];
                        $start = $_POST['oneStartDate'];
                        $end = $_POST['oneEndDate'];
                        if(empty($first)||empty($last) || empty($start) || empty($end)){
                          echo "Missing information. Please fill in all fields and try again.";
                        } else{
                          $sql = "SELECT first_name, last_name, star_id, username, user_type, timestamp FROM logins, users
                                     WHERE logins.uid = users.uid
                                     AND users.first_name = '$first'
                                     AND users.last_name = '$last'
                                     AND DATE_FORMAT(timestamp, '%m/%d/%Y') >= '$start'
									                   AND DATE_FORMAT(timestamp,'%m/%d/%Y') <= '$end'
                                     ORDER BY timestamp DESC;";
                          if($result = mysqli_query($conn, $sql)){
                              if(mysqli_num_rows($result) > 0){
                                      echo "<table class=\"table table-striped text-center\">";
                                          echo "<tr>";
                                              echo "<th class=\"text-center\">First Name</th>";
                                              echo "<th class=\"text-center\">Last Name</th>";
                                              echo "<th class=\"text-center\">StarID</th>";
                                              echo "<th class=\"text-center\">Username</th>";
                                              echo "<th class=\"text-center\">User Type</th>";
                                              echo "<th class=\"text-center\">Timestamp</th>";
                                          echo "</tr>";
                                      while($row = mysqli_fetch_array($result)){
                                              echo "<tr>";
                                                  echo "<td>" . $row['first_name'] . "</td>";
                                                  echo "<td>" . $row['last_name'] . "</td>";
                                                  echo "<td>" . $row['star_id'] . "</td>";
                                                  echo "<td>" . $row['username'] . "</td>";
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
<?php
  }
  ?>

</body>
</html>

<script>
function openTab(evt, name) {
  // Declare all variables
  var i, tabcontent, tablinks;

  //Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(name).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

<style>
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
