<?php
/*View the winks that the regular user has received*/
session_start();
$connection = mysqli_connect('localhost','root','','wink');
$msg = $_POST['msg'];
$name = $_SESSION['username'];

$sql="SELECT * FROM winkdata WHERE receivername=' .$name .'";
mysqli_query($connection,$sql);
header("Location:winkhome.php");
?>