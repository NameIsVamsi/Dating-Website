<?php
session_start();
$username = $_SESSION['username'];
$connection = mysqli_connect('localhost','root','','wink');
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
        <li><a href="index.php"><h4>Dating Site</h4></a></li>
        <li><a href="setupprofileregular.php">Setup Profile</a></li>
        <li><a href="viewprofilehome.php">View Profiles</a></li>
        <li><a href="home.php">Messages</a></li>
        <li><a href="winkhome.php">Winks</a></li>
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
        /*view the profiles of other users*/
        $sql = "SELECT * from users u join profiles p on u.username=p.username";
        $result=mysqli_query($connection,$sql);
       /* $result1=mysqli_query($connection,$sql1);*/
        if($result->num_rows>0){
            while($row=$result->fetch_array()){
            ?>
            <div class="container" style="height: auto;">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"
                style="width: 100px;height:100px;margin-bottom: 3px"/>
                <p><span><?php echo $row['username'];?></span></p>
                <p><span style="margin-bottom: 5px;"><?php echo "About : " .$row['about']."";?></span></p>

                <form method="post" action="send.php">
                    <input type="hidden" name="recname" value="<?php echo $row['username']; ?>">
                    <input type="submit" value="Message" name="sendmsg">
                </form>
                <br/>
                <form method="post" action="sendwink.php">
                    <input type="hidden" name="recname" value="<?php echo $row['username']; ?>">
                    <input type="submit" value="Send Wink" name="sendwink">
                </form>
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