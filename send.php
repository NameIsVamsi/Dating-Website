<?php
/*//Simple file to send messages to regular users*/
session_start();
$connection = mysqli_connect('localhost','root','','wink');
$msg = $_POST['msg'];
$name = $_SESSION['username'];

if(isset($_POST['sendmsg'])){
    $receivername = $_POST['recname'];
    /*echo ". $favouritename .";*/
}

$sql="INSERT INTO posts(msg,sendername,receivername) values('$msg','$name','$receivername')";
mysqli_query($connection,$sql);
header("Location:home.php");
 ?>