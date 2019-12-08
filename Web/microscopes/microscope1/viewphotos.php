<?php
  require '../../includes/sessionsconfig.inc.php';
  require '../../includes/dbh.inc.php';
  require '../../includes/functions.inc.php';

  if(!$loggedIn){
    header("Location: ../../loginpage.php");
  }

  //Get the microscope name and query the database for microscope information
  $microscopeName = getMyMicroscopeName(dirname(__FILE__));
  $sql = "SELECT experiment_name, course_name, availability, youtube, description, state FROM microscopes WHERE microscope_name = ?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "s", $microscopeName);
  mysqli_stmt_execute($stmt);
  if(mysqli_stmt_bind_result($stmt, $col1, $col2, $col3, $col4, $col5, $col6)){
          mysqli_stmt_fetch($stmt);
          $experimentName = $col1; //Define the experiment name
          $className = $col2; // Define the course name
          $availability = $col3; // Define the availability
          $youtube = $col4; // Define the youtube link
          $description = $col5; // Define the description
          $state = $col6; // Get the state
          
          // Close the statement
          mysqli_stmt_close($stmt);
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }
  
  // Close connection
  mysqli_close($conn);

  if($userType !='admin' && $state != "active"){
    header("Location: ../../microscopeunavailable.php");
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
  <link rel="stylesheet" href="../../styles/streampage-style.css">
  <link rel="stylesheet" href="../../styles/navbar-style.css">
</head>
<body>

<!-- Navigation -->
<?php include '../../navbar.php' ?>

<!-- Content -->
<div class="container" style="margin-top:30px">
    <div class="card" style="margin-bottom:30px">

        <div class="card-header">
            Images from <?php echo ucfirst($microscopeName) ?>
            <ul style="list-style: none; float: right; display:inline; margin-bottom:0;">
                <li style="display:inline"><a href="./viewlivestream.php">View the stream</a></li>
            </ul>
        </div>

        <div class="card-body">
            <div class="container">
                <?php
                // Link to delete photos. The link object toggles the modal and is passed the 
                // microscope name to be pulled out by the jquery function down below.
                // Admin ONLY
                if($userType == 'admin'){
                    echo '<div class="row">';
                    echo '<div class="col">';
                    echo '<div class="float-right">';
                    echo '<button class="btn float-right" id="deletebtn" data-microscope="'.$microscopeName.'" data-toggle="modal" data-target="#confirm-delete">Delete all photos</button><br/>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                } ?>
                <div class="row justify-content-center">
                    <?php
                        displayImages('./images');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal to delete photos. This remains hidden until the link above is clicked and is toggled by it's id -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mx-auto">
                WARNING
            </div>
            <div class="modal-body mx-auto">
                This will delete all photos for this microscope. This cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <!-- Button class of .btn ok is what gets assigned the data and consequently delivers the .post -->
                <button type="button" class="btn btn-danger btn-ok">Delete</a></button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include '../../footer.php' ?>

<!-- js and jquery for hidden modal with POST capabilities -->
<script>

// Bind to modal opening to set necessary data properties
$('#confirm-delete').on('show.bs.modal', function(e) {
    var data = $(e.relatedTarget).data(); // pull out to a variable the button.data stuff (passed in with data-***** in the html tag)
    $('.btn-ok', this).data('microscope_name', data.microscope); //Assigns data.microscope from above to 'microscope_name'
});

// POST on clicking okay
$('#confirm-delete').on('click', '.btn-ok', function(e) {
    var $modalDiv = $(e.delegateTarget);
    var microscope = $(this).data('microscope_name'); // pull out the microscope name. 'microscope_name' is where we saved it above.

    // Data to be POSTed in .json format
    var data = {microscope_name : microscope}

    $modalDiv.addClass('loading');
    $.post("../../includes/clearphotos.inc.php", data).then(function() { //POST the data
        $modalDiv.modal('hide').removeClass('loading');
    });

});

</script>

</body>
</html>
