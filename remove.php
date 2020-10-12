<?php
/*remove user from favourites for premium users*/
session_start();
$connection = mysqli_connect('localhost','root','','wink');
$name = $_SESSION['username'];
if(isset($_POST['removefav'])){
    $favouritename = $_POST['favname'];
}

$sql="DELETE FROM favourites WHERE username='$name' and favusername='$favouritename'";
$sql1="UPDATE notifications SET status='removed' WHERE sendername='$name' and receivername='$favouritename'";
mysqli_query($connection,$sql);
mysqli_query($connection,$sql1);
header("Location:viewfavourites.php");

?>