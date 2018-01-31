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
          .container{
              margin-top: 100px;
              color: aliceblue;
              width: 70%;
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
   <table class="table table-bordered">
	<Tr class="success">
		<th>Sr.No</th>
		<th>User Name</th>
		<th>Email</th>
		<th>Mobile</th>
		<th>Delete</th>
	</Tr>
		<?php 

$query="SELECT * FROM users";
$result=mysqli_query($link,$query);
$i=1;
while($row=mysqli_fetch_assoc($result))
{

echo "<Tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['mobno']."</td>";
echo "<td><a href='deleteuser.php?name=".$row['name']."'>Delete</a></td>"
?>

<Td><a href="javascript:DeleteUser('<?php echo $row['id']; ?>')" style='color:Red'><span class='glyphicon glyphicon-trash'></span></a></td><?php 

echo "</Tr>";
$i++;
}
		?>
		
</table>
    </div>
 <?php include("bootstraplower.php"); ?>
      <script type="text/javascript">
      
      </script>
  </body>
</html>