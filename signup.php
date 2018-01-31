<?php
session_start();
$link=mysqli_connect("localhost","root","test","myproject");
if(mysqli_connect_error())
    die ("Connection Error !");
if(array_key_exists('submit',$_GET))
{
    $error="";
    if(!$_GET['name'])
        $error.="<p>Name is required.</p>";
    if(!$_GET['email'])
        $error.="<p>Email is required.</p>";
    if(!$_GET['password'])
        $error.="<p>Password is required.</p>";
    if(!$_GET['mobno'])
        $error.="<p>Mobile no is required.</p>";
    if($_GET['password']!=$_GET['cpassword'])
        $error.="<p>Both password must match to each other.</p>";
    if($error!=""){
        echo '"<div class="alert alert-danger" role="alert" id="err">
  "'.$error.'"
</div>"';
    }
    else
    {
        $query="SELECT * FROM users WHERE email ='".mysqli_real_escape_string($link,$_GET['email'])."' LIMIT 1";
        $result=mysqli_query($link,$query);
        if(mysqli_num_rows($result)>0)
        {
            echo '"<div class="alert alert-danger" role="alert" id="err">
  "This account is already taken."
</div>"';
        }
        else
        {
            $query="INSERT INTO users (name ,email,password,mobno) VALUES ('".$_GET['name']."','".$_GET['email']."','".$_GET['password']."','".$_GET['mobno']."')";
        if(mysqli_query($link,$query))
        {
             echo '"<div class="alert alert-success" role="alert" id="err">
  "Signed up successfully."
</div>"';
        }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <?php include("jquery.php"); ?>
    <?php include("bootstrapupper.php"); ?>
    <?php include("mdbootstrapupper.php"); ?>
      <style type="text/css">
          html { 
                  background: url(loginimg.jpeg) no-repeat center center fixed; 
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;
                  background-size: cover;
          }
          body{
                  background: none;   
          }
          .form-simple .font-small {
                  font-size: 0.8rem; }

                .form-simple .header {
                  border-top-left-radius: .3rem;
                  border-top-right-radius: .3rem; }

                .form-simple input[type=text]:focus:not([readonly]) {
                  border-bottom: 1px solid #ff3547;
                  -webkit-box-shadow: 0 1px 0 0 #ff3547;
                  box-shadow: 0 1px 0 0 #ff3547; }

                .form-simple input[type=text]:focus:not([readonly]) + label {
                  color: #4f4f4f; }

                .form-simple input[type=password]:focus:not([readonly]) {
                  border-bottom: 1px solid #ff3547;
                  -webkit-box-shadow: 0 1px 0 0 #ff3547;
                  box-shadow: 0 1px 0 0 #ff3547; }

                .form-simple input[type=password]:focus:not([readonly]) + label {
                  color: #4f4f4f; }
                
          .container{
              width: 40%;
              margin-top: 20px;
          }
          .md-form{
              margin-bottom: 5px;
          }
          #err{
              width: 40%;
              position: relative;
              left: 400px;
          }
      </style>
    </head>
<body>
    <div class="container">
   <form method="get">

    <!--Form with header-->
    <div class="card">

        <!--Header-->
        <div class="header pt-3 grey lighten-2">

            <div class="row d-flex justify-content-start">
                <h1 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">Sign up</h1>
            </div>

        </div>
        <!--Header-->

        <div class="card-body mx-4 mt-4">

            <!--Body-->
             <div class="md-form">
                  <label for="name">Your Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Please enter your name">
            </div>
            <div class="md-form">
                 <label for="email">Your Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Ex: abc@gmail.com">
               
            </div>

            <div class="md-form ">
                <label for="password">Your Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Please enter your password" required>
                
            </div>
            <div class="md-form ">
                <label for="password">Confirm Password</label>
                <input type="password" id="password"  name="cpassword" class="form-control" placeholder="Please enter your password">
                
            </div>
             <div class="md-form">
                  <label for="name">Your Mobile no</label>
                <input type="text" id="mobno" class="form-control" name="mobno" placeholder="Ex: 1234567890">
               
            </div>
            <div class="text-center mb-4">
                <button type="submit" class="btn btn-danger btn-block z-depth-2" id="butt" name="submit">Sign up.</button>
            </div>
            <p class="font-small grey-text d-flex justify-content-center">Have an account? <a href="login.php" class="dark-grey-text font-bold ml-1"> Log in.</a></p>
           <p class="font-small grey-text d-flex justify-content-center"> <a href="main.php" class="dark-grey-text font-bold ml-1"> Home</a></p>
        </div>

    </div>
    <!--/Form with header-->

        </form>
    </div>   
   
 <?php include("bootstraplower.php"); ?>
 <?php include("mdbootstraplower.php"); ?>
      <script type="text/javascript">
      </script>
  </body>
</html>
