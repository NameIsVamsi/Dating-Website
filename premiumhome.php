<?php
session_start();
/*Display the messages for premium users*/
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
        <li><a href="premiumhome.php"><h4>Dating Site</h4></a></li>
        <li><a href="viewprofilepremium.php">View Profiles</a></li>
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
    <h1 style="background-color: #6495ed;color:white;"><?php echo $_SESSION['username']?>-online</h1>
    <div class="output">
        <?php
        $connection = mysqli_connect('localhost','root','','wink');
        $sql="SELECT * FROM posts";
        $result=mysqli_query($connection,$sql);
        if($result->num_rows>0){
            /*Displaying the messages for premium users*/
            while($row=$result->fetch_assoc()){
                echo "" .$row["sendername"]. " " .":: " .$row["msg"]. "<br>";
                echo "<br>";
            }
        }
        else{
            echo "No Messages to display";
        }
        $connection->close();
        ?>
    </div>
    <form method="post" action="send.php">
        <textarea name="msg" placeholder="Type to send message...." class="form-control"></textarea><br>
        <input type="submit" value="send">
    </form>
    <br>
    <form action="login.php">
        <input style="width:100%;background-color: #6495ed;color: white;font-size: 20px;" type="submit" value="Logout">
    </form>
</div>
</body>
</html>