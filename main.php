<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("jquery.php"); ?>
    <?php include("bootstrapupper.php"); ?>
    <?php include("mdbootstrapupper.php"); ?>
      <style type="text/css">
          .tales {
  width: 100%;
}
.carousel-inner{
  width:100%;
  max-height: 550px !important;
}
          .card-group{
              margin-top: 15px;
              margin-bottom: 15px;
              margin-left: 15px;
              margin-right: 15px;
          }
          .card{
              margin-left: 5px;
              margin-right: 5px;
              border-style: dashed;
              border-width: 2px;
          }
          .card-body{
              background-color: azure;
          }
          #navbar{
              background-color: burlywood;
          }
      </style>
    </head>
<body>
  
    
   <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
  <a class="navbar-brand" href="main.php" >Online Notice Board</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="about.php">About </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="contact.php">Contact us</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
     <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="login.php">Log in </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="signup.php">Sign up</a>
      </li>
    </ul>
    </form>
  </div>
</nav>
    
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img10.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    
    
    <div class="card-group">
  <div class="card">
    <img class="card-img-top" src="card1.jpg" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">Why to use online notice board?</h4>
      <p class="card-text">Use Online notice board and be smart ,and get rid of all the piles of files and papers.</p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="card2.jpg" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">How to start?</h4>
      <p class="card-text">Just Sign up and enjoy the service of online notice board.</p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="card3.jpg" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">Is it safe .</h4>
      <p class="card-text">It is 100% safe and secure.Its our responsbility to send your information correctly and safely ,so stay relaxed and use online notice board.</p>
    </div>
  </div>
</div>
    
    
    <div class="alert alert-primary" role="alert">
 Made by - Abhishek Malik.
</div>
 <?php include("bootstraplower.php"); ?>
 <?php include("mdbootstraplower.php"); ?>
      <script type="text/javascript">
      
      </script>
  </body>
</html>
