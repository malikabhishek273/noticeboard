<?php
session_start();
$error="";
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
   if($_GET['pass1']==$_GET['pass2']&&$_GET['pass1']!=""&&$_GET['pass2']!="")
    {
        $query="UPDATE admin SET password='".$_GET['pass1']."' WHERE id=".$_SESSION['id']." ";
        mysqli_query($link,$query);
    }
    else
        $error="Passwords dont match with each other.";
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
          .container{
              width: 35%;
              margin-top: 100px;
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
    <div class="container"> 
       <?php
       if(array_key_exists('submit',$_GET))
       {
           if($error!="")
           {
               echo '"<div class="alert alert-danger" role="alert">
              '.$error.'
                </div>"';
           }
           else
           {
               echo '<div class="alert alert-success" role="alert">
      Password has been changed successfully.
    </div>';
           }
       }
       ?>
    <form method="get">
    <!--Form with header-->
    <div class="card">

        <!--Header-->
        <div class="header pt-3 grey lighten-2">

            <div class="row d-flex justify-content-start">
                <h1 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">Update Your Password</h1>
            </div>

        </div>
        <!--Header-->

        <div class="card-body mx-4 mt-4">

            <!--Body-->
            <div class="md-form">
                 <label for="Form-email4">New Password</label>
                <input type="password" id="Form-email4" class="form-control" placeholder="Enter new passsword." name="pass1" required>
               
            </div>

            <div class="md-form pb-3">
                  <label for="Form-pass4">Confirm your password</label>
            <input type="password" id="Form-pass4" class="form-control" placeholder="Confomr your new password" name="pass2" required> 
            </div>

            <div class="text-center mb-4">
                <button type="submit" class="btn btn-danger btn-block z-depth-2" name="submit">Change Password</button>
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