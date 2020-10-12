<?php
$localhost = "localhost";
$username = "root";
$pwd = "";
$dbname = "wink";
$connection = mysqli_connect($localhost,$username,$pwd,$dbname);
if($connection===false){
    die("ERROR : Could not connect. " . mysqli_connect_error());
}
?>