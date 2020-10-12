<?php
//file to display messages to the receiver
session_start();
$connection = mysqli_connect('localhost','root','','wink');
$msg = $_POST['msg'];
$name = $_SESSION['username'];

$sql="SELECT * FROM posts where receivername=' .$name .'";
mysqli_query($connection,$sql);
header("Location:home.php");

?>