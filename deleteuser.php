<?php
session_start();

$link=mysqli_connect("localhost","root","test","myproject");
if(mysqli_connect_error())
    die ("Connection Error !");
$query="DELETE FROM users WHERE name='".$_GET['name']."'";
mysqli_query($link,$query);
?>
<html>
    <style type="text/css">
        #text{
            color: red;
            
        }
    </style>
    <h1 id="text">User has been deleted!.</h1>
    <a href="manageusers.php">back to previous page.</a>
</html>