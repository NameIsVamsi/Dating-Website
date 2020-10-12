<?php
$localhost = "localhost";
$username = "root";
$pwd = "";
$dbname = "wink";
$db = new mysqli($localhost,$username,$pwd,$dbname); /*dbconnection details*/
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Header</title>
    <link rel="stylesheet" href="header.css">
</head>
<body>
<nav>
    <ul> <!--Header for temporary users-->
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
    <div class="bodydiv">
        <!--Form to display users according to the interests-->
        <form action="" method="post">
            <h4>I am : </h4>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>
        </form>
        <form action="loadprofiles.php" method="post">
            <h4>I am Interested In : </h4>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>
            <input type="radio" id="both" name="gender" value="both">
            <label for="other">Both</label><br>
            <button type="submit" class="btn" name="login_user">Let's find a Match for you!!</button>
        </form>
    </div>

</main>

<?php
if(isset($_POST['search'])){
    $searchstring = mysqli_real_escape_string($db,$_POST['search']);
    if(isset($searchstring)){
        $searchquery="SELECT * FROM USERS WHERE UserName LIKE '%$searchstring%'";
        $result=$db->query($searchquery);
        while($rows=$result->fetch_array()){
            ?>
            <div class="container">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rows['image']); ?>"/>
                <p><span><?php echo $rows['UserName']; ?></p>
                <p><?php echo $rows['Interests']; ?></p>
            </div>
            <?php
        }
    }
    else{
        ?>
        <div class="container">
            <p><span><?php echo "Your search returned o results"; ?></span></p>
        </div>
        <?php
    }
}
?>
<footer class="footer">
    <ul>
        <li><a href="#">&copy; Copyright 2020</a></li>
    </ul>
</footer>
</body>
</html>
