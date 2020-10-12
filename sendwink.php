<?php
/*Send winks to regular users*/
session_start();
$connection = mysqli_connect('localhost','root','','wink');
$msg = $_POST['msg'];
$name = $_SESSION['username'];

if(isset($_POST['sendwink'])){
    $receivername = $_POST['recname'];
}

$sql="INSERT INTO winkdata(sendername,receivername) values('$name','$receivername')";
mysqli_query($connection,$sql);
header("Location:winkhome.php");
?>