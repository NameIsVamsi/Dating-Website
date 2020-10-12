<?php
/*This file is to send messages to the other users and viewing them*/
session_start();
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
        <li><a href="default.php"><h4>Dating Site</h4></a></li>
        <li><a href="setupprofileregular.php">Setup Profile</a></li>
        <li><a href="viewprofilehome.php">Profiles</a></li>
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
    <div class="output">
        <?php
        $connection = mysqli_connect('localhost','root','','wink');
        $sql="SELECT * FROM posts";
        $result=mysqli_query($connection,$sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                /*Displaying the sendername and message*/
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
    <!--This form will perform the backend action for sending a message-->
    <form method="post" action="send.php">
        <textarea name="msg" placeholder="Type to send message...." class="form-control"></textarea><br>
        <input type="submit" value="send">
    </form>
    <br>
</div>
</body>
</html>