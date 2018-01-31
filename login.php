<?php
session_start();
$link=mysqli_connect("localhost","root","test","myproject");
if(mysqli_connect_error())
    die ("Connection Error !");
$error="";
if(array_key_exists('submit',$_GET))
{
    if($_GET['email']&&$_GET['password'])
    {
      
        $query="SELECT * FROM users WHERE email='".mysqli_real_escape_string($link,$_GET['email'])."'";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        if(isset($row))
        {
            if($_GET['password']!=$row['password'])
            {
                  $error.="That email/password could not be found";
                $flag=1;
                 echo '"<div class="alert alert-danger" role="alert" id="err">
  "'.$error.'"
</div>"';
            }
            else
            {
                $_SESSION['id']=$row['id'];
                 setcookie("id",$row['id'],time()+60*60*24*365);
                 header("Location: userloggedin.php");
                
            }
        }
        else
        {
            $error.="That email/password could not be found";
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
                  background: url(img3.jpg) no-repeat center center fixed; 
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
              margin-top: 100px;
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
                <h1 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">Log in</h1>
            </div>

        </div>
        <!--Header-->

        <div class="card-body mx-4 mt-4">

            <!--Body-->
            <div class="md-form">
                 <label for="Form-email4">Your email</label>
                <input type="text" id="Form-email4" class="form-control" placeholder="Ex: abc@gmail.com" name="email" required>
               
            </div>

            <div class="md-form pb-3">
                  <label for="Form-pass4">Your password</label>
            <input type="password" id="Form-pass4" class="form-control" placeholder="Enter your password" name="password" required>
              
              
            </div>

            <div class="text-center mb-4">
                <button type="submit" class="btn btn-danger btn-block z-depth-2" name="submit">Log in</button>
            </div>
            <p class="font-small grey-text d-flex justify-content-center">Don't have an account? <a href="signup.php" class="dark-grey-text font-bold ml-1"> Sign up</a></p>
            <p class="font-small grey-text d-flex justify-content-center"><a href="main.php" class="dark-grey-text font-bold ml-1"> Home</a></p>
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
