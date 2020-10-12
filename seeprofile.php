<?php
session_start();
//
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
        <nav>
            <ul>
                <li><a href="default.php"><h4>Dating Site</h4></a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
                <div class="searchfield">
                    <form action="searchprofiles.php" method="post">
                        <input type="text" name="searchstring" />
                        <input type="submit" value="search" name="searchuser"/>
                    </form>
                </div>
            </ul>
        </nav>
    </ul>
</nav>
<div id="main">
    <div class="output">
        <?php
        if(isset($_POST['see_profile'])){
            $name = mysqli_real_escape_string($connection,$_POST['recname']);
        }
        $sql = "SELECT * from users u join profiles p on u.username=p.username where u.username LIKE '.$name.'";
        $result=mysqli_query($connection,$sql);
        if($result->num_rows>0){
            while($row=$result->fetch_array()){
                ?>
                <div class="container">
                    <h1><?php echo '.$name.'?></h1>
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"
                         style="width: 600px;height:400px;margin-bottom: 3px"/>
                    <p><span>Name : <?php echo $row['username'];?></span></p><br>
                    <p><span>Works At : <?php echo $row['work'];?></span></p><br>
                    <p><span>Interests : <?php echo $row['interests'];?></span></p><br>
                    <p><span>About Me : <?php echo $row['about'];?></span></p><br>
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