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
  <link rel="stylesheet" href="styles/adminpage-style.css">
  <link rel="stylesheet" href="styles/navbar-style.css">
</head>

<body>
<!-- Navigation Bar -->
<?php include 'navbar.php'; ?>

<div class="container" style="margin-top:30px">
  <div class="card" style="margin-bottom:30px">
    <div class="card-header">
        Modify User Account
        <a href="adminpanel.php" style="float: right;">Back to admin panel</a>
    </div>

  <div class="card-body" style="min-height: 60vh">
    <div class="container">

<!-- Seach by StarID -->
 <div style="margin-bottom:10px">
        <!-- <form id="search-login" class="form-inline" action="tracklogin.php" method="post">
        <div class="form-group">
          <input type="text" name = "star_ID" placeholder="StarID" class="form-control" />
        </div>
        <div class="form-group">
          <button class="btn" name="search-submit" type="submit" class="form-control" >Search</button>
        </div>
        </form> -->

        <!-- Tab links -->
        <!-- Tab links -->
        <h6>Click on the tabs below to modify user account information</h6>
        <div class="tab">
          <button class="tablinks" onclick="openTab(event, 'DeleteName')">Delete Account by Name</button>
          <button class="tablinks" onclick="openTab(event, 'DeleteClass')">Delete Accounts by Class</button>
          <button class="tablinks" onclick="openTab(event, 'ChangeAccess')">Change User Access</button>
        </div>

        <!-- Tab content -->
        <div id='DeleteClass' class="tabcontent">
          <h3>Delete Accounts By Class</h3>
          <p>Delete all user account by course name and section. Please fill in all fields. </p>
          <form id="delete-class" class="form-inline" action="modifyuser.php" method="post">
          <div class="form-group">
            <input type="text" name = "course" placeholder="Course Number" class="form-control" />
          </div>
          <div class="form-group">
            <input type="text" name = "section" placeholder="Section" class="form-control" />
          </div>
          <div class="form-group">
            <button class="btn" name="delete-class" onclick="confirmDelete('delete-class')" type="submit" class="form-control">Delete All</button>
          </div>
        </form>
      </div>

        <div id='DeleteName' class="tabcontent">
          <h3>Delete Account by Name</h3>
          <p>Delete user account by first and last name. Please fill in all fields.</p>
          <form id="delete-name" class="form-inline" action="modifyuser.php" method="post">
          <div class="form-group">
            <input type="text" name = "firstName" placeholder="First Name" class="form-control" />
          </div>
          <div class="form-group">
            <input type="text" name = "lastName" placeholder="Last Name" class="form-control" />
          </div>
          <div class="form-group">
            <button class="btn" name="delete-name" onclick="confirmDelete('delete-name')" type="submit" class="form-control" >Delete</button>
          </div>
          </form>
        </div>



        <div id='ChangeAccess' class="tabcontent">
          <h3>Change User Access</h3>
          <p>Update user account to have administrative access. Please fill in all fields.</p>
          <form id="change-access" class="form-inline" action="modifyuser.php" method="post">
            <div class="form-group">
              <input type="text" name = "cFirstName" placeholder="First Name" class="form-control" />
            </div>
            <div class="form-group">
              <input type="text" name = "cLastName" placeholder="Last Name" class="form-control" />
            </div>
            <div class = "form-group">
            <button class="btn" name="change-access" type="submit"  onclick="confirmUpdate('change-access')" class="form-control" >Update</button>
          </div>
          </div>
          </form>



        <?php if(isset($_POST['delete-name']) ||isset($_POST['delete-class']) || isset($_POST['change-access'])){
          include "includes/dbh.inc.php";
        ?>

        <div class="card" style="margin-bottom:30px">

                <div class="card-header">
                    Modify Result
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="table-responsive">
                            <?php
                            	if(isset($_POST['delete-name'])){
                                $first = $_POST['firstName'];
                                $last = $_POST['lastName'];
                                // sql to delete a record

                                if(empty($first) || empty($last)){
                                  echo "Please fill in all fields and try again for delete account by name.";
                                }else{
                                  $sql = "DELETE FROM users WHERE first_name ='$first' and last_name = '$last'";
                                  if ($conn->query($sql) === TRUE) {
                                    $rowCount = mysqli_affected_rows($conn);
                                    if($rowCount > 0){
                                        echo "User account for ".$first." ".$last." has been deleted successfully.";
                                    }else{
                                      echo "No record for ".$first." ".$last." in the database.";
                                      echo "<br>"."There is either no name that match or information may have been mistyped.";
                                    }
                                  } else {
                                    echo "Error deleting record: " . $conn->error;
                                  }
                                }
                                  // Close connection
                                  mysqli_close($conn);
                                }

                              if(isset($_POST['delete-class'])){
                                $course = $_POST['course'];
                                $section = $_POST['section'];
                                if(empty($course)||empty($section)){
                                  echo "Please fill in all fields and try again for delete account by class.";
                                } else{
                                  $sql = "DELETE FROM users WHERE course_name ='$course' and section = '$section'";
                                  if ($conn->query($sql) === TRUE) {
                                    $rowCount = mysqli_affected_rows($conn);
                                    if($rowCount > 0){
                                        echo "Number of account(s) deleted: ".$rowCount.".";
                                        echo "<br>"."User accounts for course ".$course." section ".$section." has been deleted successfully.";
                                    }else{
                                        echo "No record for course ".$course." section ".$section." in the database.";
                                        echo "<br>"."There is either no course/section that match or information may have been mistyped.";
                                    }

                                  } else {
                                    echo "Error deleting record: " . $conn->error;
                                  }

                                }
                                // Close connection
                                mysqli_close($conn);
                              }

                              if(isset($_POST['change-access'])){
                                $cFirst = $_POST['cFirstName'];
                                $cLast = $_POST['cLastName'];
                                if(empty($cFirst) || empty($cLast)){
                                  echo "Please fill in all fields and try again for changing user access.";
                                } else{
                                    $sql = "UPDATE users SET user_type = 'admin' WHERE first_name ='$cFirst' and last_name = '$cLast'";
                                    if ($conn->query($sql) === TRUE) {
                                      $rowCount = mysqli_affected_rows($conn);
                                      if($rowCount > 0){
                                          echo "User account ".$cFirst." ".$cLast." has been successfully change to administrative access.";
                                      }else{
                                        echo "No record for ".$cFirst." ".$cLast." in the database.";
                                        echo "<br>"."There is either no name that match or information may have been mistyped.";
                                      }
                                    } else {
                                      echo "Error at changing user access record: " . $conn->error;
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
</div>
<div class="card" style="margin-bottom:30px">

        <div class="card-header">
            Existing User Accounts
        </div>

        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
                    <?php include "includes/dbh.inc.php";
                        $sql = "SELECT first_name, last_name, course_name, section, star_id, username, user_type FROM users
                                  ORDER BY first_name";
                        $i = 0;
                        if($result = mysqli_query($conn, $sql)){
                            $numberOfRows = mysqli_num_rows($result);
                            if(mysqli_num_rows($result) > 0){
                                    echo "<table class=\"table table-striped text-center\">";
                                        echo "<tr>";
                                            echo "<th class=\"text-center\">First Name</th>";
                                            echo "<th class=\"text-center\">Last Name</th>";
                                            echo "<th class=\"text-center\">Course Name</th>";
                                            echo "<th class=\"text-center\">Section</th>";
                                            echo "<th class=\"text-center\">Star ID</th>";
                                            echo "<th class=\"text-center\">Username</th>";
                                            echo "<th class=\"text-center\">User Type</th>";
                                        echo "</tr>";
                                    while($row = mysqli_fetch_array($result)){
                                        // echo "<form id=\"useraccount-form". $i++ ."\" method=\"POST\" action=\"includes/modifyuser.inc.php\" class=\"form-horizontal\">";
                                        //     echo '<input type="hidden" id="classpasswordID" name="cpid" value="'. $row['cpid'] . '">';
                                        //     echo "<tr>";
                                                echo "<td>" . $row['first_name'] . "</td>";
                                                echo "<td>" . $row['last_name'] . "</td>";
                                                echo "<td>" . $row['course_name'] . "</td>";
                                                echo "<td>" . $row['section'] . "</td>";
                                                echo "<td>" . $row['star_id'] . "</td>";
                                                echo "<td>" . $row['username'] . "</td>";
                                                echo "<td>" . $row['user_type'] . "</td>";
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

function confirmDelete(name)
{
  var x;
  var r = confirm("Are you sure you want to delete user account(s)?");
  if (r == false) {
    document.getElementById(name).reset();
  }
}
function confirmUpdate(name)
 {
   var x;
   var r = confirm("Are you sure you want to change this user access to admin?");
   if (r == false) {
     document.getElementById(name).reset();
   }
}

</script>

<style>
/* Style the tab */
.tab {
  overflow: hidden;
  border-bottom: 1px solid #ccc;
  margin-bottom: 10px;
  background-color: #fff;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #eee;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #A2C7E5;
  color: #FFF;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  /* border: 1px solid #ccc;
  border-top: none; */
}
</style>
