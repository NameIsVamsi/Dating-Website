<?php
/*file to display the user profile when searched for*/
$username="";
$db = mysqli_connect('localhost','root','','wink');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if(isset($_POST['searchuser'])) {
    $username = mysqli_real_escape_string($db, $_POST['searchstring']);
    $sql = "SELECT * FROM users WHERE username LIKE '%".$username."%'";
    $results = mysqli_query($db, $sql);
    if(empty($username)){
        echo "<p><h3>Please provide a value</h3></p>";
    }
    else{
        ?>

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <title>Search</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link rel="stylesheet" href="header.css">
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
        <p><h3><?php echo "Results for : " .$username. ' '?></h3></p>
        <?php
        while($row=$results->fetch_array()){
            ?>
                <!--Displaying the returned results-->
            <div class="container">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"/>
                <p><span><?php echo $row['username']; ?></p>
                <p><?php echo $row['gender']; ?></p>
            </div>
            <?php
        }
        ?>
        </body>
        </html>
        <?php
    }
}
?>