<?php
  require 'includes/sessionsconfig.inc.php';
  $homepath = 'http://'.$_SERVER['SERVER_NAME'].'/';
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <title>VirtualScope</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/homepage-style.css">
  <link rel="stylesheet" href="styles/navbar-style.css">
</head>
<body>

<!-- Navigation Bar -->
<?php include 'navbar.php'; ?>
<div id="home-jumbotron" class="jumbotron-fluid jumbotron bg-cover">
  <div class="overlay"></div>
  <div class="container">
    <h1 class="display-3 mb-1">About Us</h1>

  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <img src="<?php echo $homepath?>images/cindy_harley.jpg" width=260 height=260 class="mx-auto d-block">
      <h3 class="text-center">Professor Cindy Harley</h3>
      <p>The inception of VirtualScope began with Professor Cindy Harley. Professor Harley is an Assistant Professor of Natural Sciences at Metropolitan State University. While teaching, she found that it was hard for students to come in and observe microscopic contents on a regular basis. She saw that students needed a way to view microscope contents while not at school. With that in mind, she wanted to have some sort of live stream of the microscope content but did not have the knowledge on how to implement her idea. Professor Harley contacted a professor in the Computer Science field and was able to get connected to a group of students that would bring her idea to fruition. <br/> 
    </div>

    <div class="col-md-6">
      <img src="<?php echo $homepath?>images/teamPuma.jpg" class="mx-auto d-block">
      <h3 class="text-center">Team Puma</h3>
      <p>The design and creation of the project in collaboration with Professor Cindy Harley comes from Team Puma. Team Puma consists of four students at Metropolitan State University. The members of Team Puma include: Yer Moua, Ryan Vagle , Jahia Vang, and Hlee Yang. The group formed in the Capstone Class under Professor David Levitt during Fall 2019. Team Puma developed the project for the benefit of individuals who could not be on campus constantly observing microscopic subjects. With the large number of nontraditional students that attend Metropolitan State University, VirtualScope is a convenient and necessary tool to complete assignments and learn. <br/>
    </div>
    
  </div>
</div>

<!-- Footer -->
<?php include 'footer.php' ?>

</body>
</html>
