<!DOCTYPE html>
<html lang="en">
<head>
  <title>VirtualScope</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./style.css">
  <style>
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    .row.content {height: 450px}

    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    .content {
      margin: center;
      text-align: center;
      }
    .footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">VirtualScope</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><form action="includes/logout.inc.php" method="post">
              <button type ="submit" name="logout-submit">Logout</button>
            </form></li>
        <!--<form action="includes/logout.inc.php" method="post">
              <button type ="submit" name="logout-submit">Logout</button>
            </form>-->
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="content">
    <h1><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" /><font color = "white" face="Roboto"> Archived Project Photo(s)</font></b></h1>
    <li>
        <div class="cd-full-width">
            <div class="container-fluid js-tm-page-content" data-page-no="2" data-page-type="gallery">
                <div class="tm-img-gallery-container">
                    <div class="tm-img-gallery gallery-two">
                    <!-- Gallery Two pop up connected with JS code below -->

                        <div class="grid-item">
                            <figure class="effect-sadie">
                                <img src="img/tm-img-12-tn.jpg" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <h2 class="tm-figure-title">Pix <span><strong>One</strong></span></h2>
                                    <p class="tm-figure-description">Pix 1</p>
                                    <a href="img/tm-img-12.jpg">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item">
                            <figure class="effect-sadie">
                                <img src="img/tm-img-11-tn.jpg" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <h2 class="tm-figure-title">Pix <span><strong>Two</strong></span></h2>
                                    <p class="tm-figure-description">Pix 2</p>
                                    <a href="img/tm-img-11.jpg">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item">
                            <figure class="effect-sadie">
                                <img src="img/tm-img-10-tn.jpg" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <h2 class="tm-figure-title">Pix <span><strong>Three</strong></span></h2>
                                    <p class="tm-figure-description">Pix 3</p>
                                    <a href="img/tm-img-10.jpg">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item">
                            <figure class="effect-sadie">
                                <img src="img/tm-img-09-tn.jpg" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <h2 class="tm-figure-title">Pix <span><strong>Four</strong></span></h2>
                                    <p class="tm-figure-description">Pix 4</p>
                                    <a href="img/tm-img-09.jpg">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item">
                            <figure class="effect-sadie">
                                <img src="img/tm-img-08-tn.jpg" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <h2 class="tm-figure-title">Pix <span><strong>Five</strong></span></h2>
                                    <p class="tm-figure-description">Pix 5</p>
                                    <a href="img/tm-img-08.jpg">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item">
                            <figure class="effect-sadie">
                                <img src="img/tm-img-07-tn.jpg" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <h2 class="tm-figure-title">Pix <span><strong>Six</strong></span></h2>
                                    <p class="tm-figure-description">Pix 6</p>
                                    <a href="img/tm-img-07.jpg">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item">
                            <figure class="effect-sadie">
                                <img src="img/tm-img-06-tn.jpg" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <h2 class="tm-figure-title">Pix <span><strong>Seven</strong></span></h2>
                                    <p class="tm-figure-description"></p>
                                    <a href="img/tm-img-06.jpg">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item">
                            <figure class="effect-sadie">
                                <img src="img/tm-img-05-tn.jpg" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <h2 class="tm-figure-title">Pix <span><strong>Eight</strong></span></h2>
                                    <p class="tm-figure-description">Picture Info</p>
                                    <a href="img/tm-img-05.jpg">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item">
                            <figure class="effect-sadie">
                                <img src="img/tm-img-04-tn.jpg" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <h2 class="tm-figure-title">Pix <span><strong>Nine</strong></span></h2>
                                    <p class="tm-figure-description">Picture Info</p>
                                    <a href="img/tm-img-04.jpg">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item">
                            <figure class="effect-sadie">
                                <img src="img/tm-img-03-tn.jpg" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <h2 class="tm-figure-title">Pix <span><strong>Ten</strong></span></h2>
                                    <p class="tm-figure-description">Picture Info</p>
                                    <a href="img/tm-img-03.jpg">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item">
                            <figure class="effect-sadie">
                                <img src="img/tm-img-02-tn.jpg" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <h2 class="tm-figure-title">Pix <span><strong>Eleven</strong></span></h2>
                                    <p class="tm-figure-description">Picture Info</p>
                                    <a href="img/tm-img-02.jpg">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item">
                            <figure class="effect-sadie">
                                <img src="img/tm-img-01-tn.jpg" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <h2 class="tm-figure-title">Pix <span><strong>Twelve</strong></span></h2>
                                    <p class="tm-figure-description">Picture Info</p>
                                    <a href="img/tm-img-01.jpg">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item">
                            <figure class="effect-sadie">
                                <img src="img/tm-img-13-tn.jpg" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <h2 class="tm-figure-title">Pix <span><strong>13</strong></span></h2>
                                    <p class="tm-figure-description">Picture Info</p>
                                    <a href="img/tm-img-13.jpg">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item">
                            <figure class="effect-sadie">
                                <img src="img/tm-img-14-tn.jpg" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <h2 class="tm-figure-title">Pix <span><strong>14</strong></span></h2>
                                    <p class="tm-figure-description">Picture Info</p>
                                    <a href="img/tm-img-14.jpg">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item">
                            <figure class="effect-sadie">
                                <img src="img/tm-img-15-tn.jpg" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <h2 class="tm-figure-title">Pix <span><strong>15</strong></span></h2>
                                    <p class="tm-figure-description">Picture Info</p>
                                    <a href="img/tm-img-15.jpg">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="grid-item">
                            <figure class="effect-sadie">
                                <img src="img/tm-img-16-tn.jpg" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <h2 class="tm-figure-title">Pix <span><strong>16</strong></span></h2>
                                    <p class="tm-figure-description">Picture Info</p>
                                    <a href="img/tm-img-16.jpg">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>

</body>
</html>
