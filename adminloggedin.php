<?php
session_start();

$link=mysqli_connect("localhost","root","test","myproject");
if(mysqli_connect_error())
    die ("Connection Error !");
if(array_key_exists("id",$_COOKIE))
{
    $_SESSION['id']=$_COOKIE['id'];
}
if(array_key_exists("id",$_SESSION))
{
    $query="SELECT * FROM admin WHERE id='".$_SESSION['id']."'LIMIT 1";
    $result=mysqli_query($link,$query);
    $row=mysqli_fetch_array($result);
    $var=$row['email'];
   // echo $var;
    //echo "<p>Logged in <a href='login.php'>LOGOUT</a></p>";
}
else
{
    header("Location: adminlogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("jquery.php"); ?>
    <?php include("bootstrapupper.php"); ?>
      <style type="text/css">
           html { 
                  background: url(img.jpg) no-repeat center center fixed; 
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;
                  background-size: cover;
          }
          body{
                  background: none;   
          }
          .navbar{
              background-color: burlywood;
          }
      </style>
    </head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
  <a class="navbar-brand" ><?php echo "Hello Admin  "; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="update_passwordadmin.php">Update Password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manageusers.php">Manage Users</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="createmsg.php">Create Messages</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="msghis.php">Messages History</a>
      </li>
        
    </ul>
    <form class="form-inline my-2 my-lg-0">
     <li class="nav-item ">
        <a class="nav-link" href="adminlogin.php">Logout?</a>
      </li>
    </form>
  </div>
</nav>
    <?php header("Location:createmsg.php"); ?>
 <?php include("bootstraplower.php"); ?>
      <script type="text/javascript">
      
      </script>
  </body>
</html>