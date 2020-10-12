<?php
/*This is to display notifications for premium users*/
session_start();
$connection = mysqli_connect('localhost','root','','wink');
$msg = $_POST['msg'];
$name = $_SESSION['username'];

$sql="SELECT * FROM notifications where receivername=' .$name .'";
mysqli_query($connection,$sql);
header("Location:homenotifications.php");

?>