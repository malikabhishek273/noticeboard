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
    $query="SELECT * FROM users WHERE id='".$_SESSION['id']."'LIMIT 1";
    $result=mysqli_query($link,$query);
    $row=mysqli_fetch_array($result);
    $var=$row['name'];

    if($_GET['email']!="")
    {
        $query="UPDATE users SET email='".$_GET['email']."' WHERE id=".$_SESSION['id']." ";
        mysqli_query($link,$query);
    }
    if($_GET['mobno']!="")
    {
        $query="UPDATE users SET mobno='".$_GET['mobno']."' WHERE id=".$_SESSION['id']." ";
        mysqli_query($link,$query);
    }
}
else
{
    header("Location: login.php");
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
          .container{
              width: 35%;
              margin-top: 100px;
          }
      </style>
    </head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
  <a class="navbar-brand" ><?php echo "Hello ".$var; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="update_password.php">Update Password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="update_profile.php">Update Profile</a>
      </li>
          <li class="nav-item">
        <a class="nav-link" href="notification.php">Notification</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
     <li class="nav-item ">
        <a class="nav-link" href="login.php">Logout?</a>
      </li>
    </form>
  </div>
</nav>
    <div class="container">
    <?php
        if(array_key_exists('submit',$_GET))
        {
            echo '<div class="alert alert-success" role="alert">
     Delails have been updated successfully.
    </div>';
        }
        ?>
   <form method="get">

    <!--Form with header-->
    <div class="card">

        <!--Header-->
        <div class="header pt-3 grey lighten-2">

            <div class="row d-flex justify-content-start">
                <h1 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">Update Your Details. </h1>
            </div>

        </div>
        <!--Header-->

        <div class="card-body mx-4 mt-4">

            <!--Body-->
            <div class="md-form">
                 <label for="email">Your Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Ex: abc@gmail.com">
               
            </div>
             <div class="md-form">
                  <label for="name">Your Mobile no</label>
                <input type="text" id="mobno" class="form-control" name="mobno" placeholder="Ex: 1234567890">
               
            </div>
            <div class="text-center mb-4">
                <button type="submit" class="btn btn-danger btn-block z-depth-2" id="butt" name="submit">Update details.</button>
            </div>
           
        </div>

    </div>
    <!--/Form with header-->

        </form>
    </div>
 <?php include("bootstraplower.php"); ?>
      <script type="text/javascript">
      
      </script>
  </body>
</html>