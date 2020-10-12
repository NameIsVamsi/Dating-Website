<?php
/*Premium user profile page*/
session_start();
$username = $_SESSION['username'];
$connection = mysqli_connect('localhost','root','','wink');

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PremiumUser</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="header.css">
</head>
<body>
<nav>
    <ul style="font-size: 25px;">
        <li><a href="premiumuserindex.php"><h4>Dating Site</h4></a></li>
        <li><a href="setupprofilepremium.php">Setup Profile</a></li>
        <li><a href="viewprofilepremium.php">Profiles</a></li>
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
    <!--<h1 style="background-color: #6495ed;color:white;"><?php /*echo "Welcome : " .$_SESSION['username'].""*/?></h1>-->
    <div class="output">
        <?php
        $sql = "SELECT * from users u join profiles p on u.username=p.username where u.username LIKE '$username'";
        $result=mysqli_query($connection,$sql);
        /* $result1=mysqli_query($connection,$sql1);*/
        if($result->num_rows>0){
            /*Displaying the premium user profile*/
            while($row=$result->fetch_array()){
                ?>
                <div class="container" style="height: auto;width: 1400px;">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" style="width: 90%;"/><br>
                    <p><span><?php echo "Name : " .$row['username']. "";?></span></p>
                    <p><span style="margin-bottom: 5px;"><?php echo "About : " .$row['about']."";?></span></p>
                    <p><span style="margin-bottom: 5px;"><?php echo "Works At : " .$row['work']."";?></span></p>
                    <p><span style="margin-bottom: 5px;"><?php echo "Interests : " .$row['interests']."";?></span></p>


                </div>
                <?php
            }
        }
        else{
            echo "No Profiles to show";
        }
        $connection->close();
        ?>
    </div>
</div>

</body>
</html>