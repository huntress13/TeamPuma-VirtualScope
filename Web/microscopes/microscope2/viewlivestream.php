<?php
  require '../../includes/sessionsconfig.inc.php';
  require '../../includes/dbh.inc.php';
  require '../../includes/functions.inc.php';

  if(!$loggedIn){
    header("Location: ../../index.php");
  }

  //Get the microscope name and query the database for microscope information
  $microscopeName = getMyMicroscopeName(dirname(__FILE__));
  $sql = "SELECT experiment_name, course_name, availability FROM microscopes WHERE microscope_name = ?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "s", $microscopeName);
  mysqli_stmt_execute($stmt);
  if(mysqli_stmt_bind_result($stmt, $col1, $col2, $col3)){
          mysqli_stmt_fetch($stmt);
          $experimentName = $col1; //Define the experiment name
          $className = $col2; // Define the course name
          $availability = $col3; // Define the availability
          
          // Close the statement
          mysqli_stmt_close($stmt);
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }
  
  // Close connection
  mysqli_close($conn);
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
<?php include '../../navbar.php'; ?>

<!-- Content -->
<div class="container" style="margin-top:30px">
  <div class="row justify-content-center">
    <div class="col-9">
      <div class="card">
        <div class="card-body">
          <div class="videoWrapper">
            <!-- Put YOUTUBE link below -->
            <iframe width="560" height="349" src="https://www.youtube.com/embed/live_stream?channel=UCHnYxq3EFkmzcnPAu_D1TIA" frameborder="0" allowfullscreen></iframe>
          </div>
          <hr>
          <button class="btn" name ="viewphoto-submit" type="submit" onclick="window.location.href='./viewphotos.php'">View Archived Photos</button>
          <button class="btn" name ="googledocs-submit" type="submit" onclick="window.open('https://docs.google.com/forms/d/1Oa1WRS4LZLZQ9nuTjRTILW01rp9zHC7eG6cFWW6NvHs/edit')">Complete Experiment WorkSheet</button>
        </div>
      </div>
      <div class="card" style="margin-top: 30px; margin-bottom: 30px">
        <div class="card-header">Cell Division</div>
        <div class="card-body">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec ligula risus. Proin orci libero, scelerisque et vulputate nec, blandit vitae urna. 
           Nunc enim eros, lacinia non iaculis in, sagittis eget dui. Integer interdum gravida libero, a vestibulum mauris tempor varius. Sed turpis neque, vestibulum
            eu fermentum vitae, ullamcorper quis tellus. Suspendisse vulputate vitae lorem luctus pellentesque. Vestibulum magna tortor, mollis eu ex ut, congue placerat
             lectus. Nunc malesuada, risus vitae eleifend consectetur, ex sem scelerisque arcu, quis convallis purus quam sed eros. In pharetra velit quis aliquam 
             condimentum. Nunc vel tincidunt lectus. In id massa nec orci ultrices vehicula vitae vitae nulla.
            <br/><br/>
           Ut porta elit non vestibulum mattis. Ut pretium interdum neque, quis facilisis nisl ultricies blandit. In hac habitasse platea dictumst. Aenean ex sapien, 
           pellentesque eget magna vulputate, tristique interdum dolor. In feugiat, nisi semper eleifend viverra, neque lectus auctor erat, aliquet pharetra odio urna at justo.
            Donec tincidunt purus a nisi interdum porttitor. Aenean hendrerit semper urna, vitae pellentesque justo hendrerit at. Phasellus pharetra laoreet lorem, sit amet
             tincidunt massa aliquet nec. Ut quis lacus maximus, mollis sem nec, hendrerit massa. Proin id ligula at lorem eleifend varius. Aenean quis cursus mi, vel euismod massa.
              Duis dictum purus et dolor sodales, id malesuada felis dignissim. Fusce maximus magna sit amet diam rutrum tristique. Sed malesuada tempus justo non sollicitudin.
               Aenean metus neque, commodo eu consequat ac, blandit in diam.</p>
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="card">
        <div class="card-header"><?php echo ucfirst($microscopeName); ?></div>
        <div class="card-body">
          <b>Experiment:</b>
          <p><?php echo $experimentName ?></p>
          <b>Class:</b>
          <p><?php echo $className ?></p>
          <b>Available:</b>
          <p><?php echo $availability ?></p>
        </div>
      </div>
      <div class="card" style="margin-top: 30px; margin-bottom: 30px">
        <div class="card-header">Latest Images</div>
        <div class="card-body">
          <a href="viewphotos.php" style="margin-top: -10px; float: right;">View all</a><br/>
          <?php
            displayLatest('./images', 3);

            ?>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
