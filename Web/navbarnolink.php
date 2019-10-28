
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<div class="container">
  <a class="navbar-brand" href="index.php">VirtualScope</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <!-- <li class="nav-item">
        <a class="nav-link" href="viewlivestream.php">Stream</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewlivestream2.php">StreamV2</a>
      </li>   
      <li class="nav-item">
        <a class="nav-link" href="viewlivestream3.php">StreamV3</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="viewlive5.php">StreamV4</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="viewphoto2.php">Photos</a>
      </li> -->
    </ul>

    <?php 
        if($loggedIn){
            echo'
            <ul class="navbar-nav ml-auto">
              <li class="nav-text">
              '. $username .'
              </li>';
              if($userType == "admin"){
                echo'
                <li class="nav-item">
                <a class="nav-link" href="adminpanel.php">AdminPanel</a>
                </li>';
              }
              echo'
              <li class="nav-item">
              <a class="nav-link" href="includes/logout.inc.php">Log Out</a>
              </li>    
            </ul>';
        } else{
            echo'
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="loginpage.php">Login</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="signup.php">Sign up</a>
            </li>    
        </ul>';
        }
    ?>
  </div>
</div>  
</nav>