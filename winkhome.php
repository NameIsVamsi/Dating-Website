<?php
session_start();
$name=$_SESSION['username'];
/*Displaying the winks that a registered user has received*/
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
    <div class="output">
        <?php
        $connection = mysqli_connect('localhost','root','','wink');
        $sql="SELECT * FROM winkdata";
        $result=mysqli_query($connection,$sql);
        /*displaying the wink data*/
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo "" .$row["sendername"]. " " .":: " .$row["description"]." " .$row['receivername']. "<br>";
                echo "<br>";
            }
        }
        else{
            echo "No one has winked at you";
        }
        $connection->close();
        ?>
    </div>
</div>
</body>
</html>