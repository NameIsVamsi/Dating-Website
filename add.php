<?php
/*This file is to add users into favourites list and send notifications accordingly*/
session_start();
$connection = mysqli_connect('localhost','root','','wink');
$name = $_SESSION['username'];
if(isset($_POST['addfav'])){
    $favouritename = $_POST['favname'];
}
$sql="INSERT INTO favourites(username,favusername) values('$name','$favouritename')";
$sql1="INSERT INTO notifications(sendername,receivername,status) values('$name','$favouritename','added')";
mysqli_query($connection,$sql);
mysqli_query($connection,$sql1);
header("Location:viewfavourites.php");

?>