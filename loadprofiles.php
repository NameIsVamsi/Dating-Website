<?php
/*This file is used to display the users according to their interests*/
$localhost = "localhost";
$username = "root";
$pwd = "";
$dbname = "wink";
$connection = new mysqli($localhost,$username,$pwd,$dbname);
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LoadProfiles</title>
    <link rel="stylesheet" href="header.css"/>
    <link rel="stylesheet" href="header.css"/>
</head>
<body>
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
<main>
    <h2>People you may be interested in</h2>
    <p>Meet People you like by Signing Up!!</p>
    <?php
    if(isset($_POST['login_user'])){
        $value = $_POST['gender'];
    }

    if($value === 'male'){
        $sql = "SELECT * FROM users u join profiles p on u.username=p.username WHERE gender='male'";
        $result = $connection->query($sql);
    }
    else if($value === 'female'){
        $sql = "SELECT * FROM users u join profiles p on u.username=p.username WHERE gender='female'";
        $result = $connection->query($sql);
    }
    else{
        $sql = "SELECT * FROM users u join profiles p on u.username=p.username";
        $result = $connection->query($sql);
    }
    while($rows=$result->fetch_array()){
        ?>
        <div class="container">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rows['image']); ?>"style="width: 100px;height:100px;margin-bottom: 3px"/>
            <p><span><?php echo $rows['username']; ?></p>
            <p><?php echo $rows['gender']; ?></p>
        </div>
        <?php
    }
    ?>
</main>
</body>
</html>
