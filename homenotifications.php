<?php
session_start();
$username=$_SESSION['username'];
/*This is to view the notifications for the regular user*/
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="home.css"/>
    <link rel="stylesheet" href="header.css"/>
</head>
<body>
<nav>
    <ul>
        <li><a href="premiumuserindex.php"><h4>Dating Site</h4></a></li>
        <li><a href="viewprofilehome.php">View Profiles</a></li>
        <li><a href="home.php">Messages</a></li>
        <li><a href="winkhome.php">Winks</a></li>
        <li><a href="viewfavourites.php">Favourites</a></li>
        <li><a href="homenotifications.php">Notifications</a></li>
        <div class="searchfield">
            <form action="searchprofiles.php" method="post">
                <input type="text" name="searchstring" />
                <input type="submit" value="search" name="searchuser"/>
            </form>
        </div>
        <li><a href="login.php">Logout</a></li>
    </ul>
</nav>
<div id="main">
    <div class="">
        <?php
        $connection = mysqli_connect('localhost','root','','wink');
        $sql="SELECT * FROM notifications";
        $result=mysqli_query($connection,$sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                /*Displaying the notifications like added to/removed from favourites*/
                echo "" .$row["receivername"]. " " .":: " .$row["status"]. "you"."<br>";
                echo "<br>";
            }
        }
        else{
            echo "No Notifications to display";
        }
        $connection->close();
        ?>
    </div>
    <br>
</div>
</body>
</html>