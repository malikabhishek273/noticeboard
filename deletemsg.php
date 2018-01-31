<?php
session_start();

$link=mysqli_connect("localhost","root","test","myproject");
if(mysqli_connect_error())
    die ("Connection Error !");
$query="DELETE FROM notices WHERE noticeid='".$_GET['id']."'";
mysqli_query($link,$query);
?>
<html>
    <style type="text/css">
        #text{
            color: red;
            
        }
    </style>
    <h1 id="text">Notice has been deleted!.</h1>
    <a href="msghis.php">back to previous page.</a>
</html>