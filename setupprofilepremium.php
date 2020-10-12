<?php
/*FIle to setup profile for a premium user*/
session_start();
$localhost = "localhost";
$username = "root";
$pwd = "";
$dbname = "wink";
$db = new mysqli($localhost,$username,$pwd,$dbname);

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
$username = $_SESSION['username'];
$query = mysqli_query($db,"SELECT * FROM users where UserName='$username'") or die(mysqli_error());
$row = mysqli_fetch_array($query);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Setup</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="home.css">
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
<div class="">
    <h2 style="text-align: center">Let's setup your profile</h2>

<form action="" method="post" enctype="multipart/form-data" class="formclass" style="margin-top: 15px">
    <div class="inputdiv">
        <label>Profile Pic:</label>
        <input type="file" name="image" class="inputdiv" accept="image/*" >
    </div>
    <div class="inputdiv">
        <label>Works At : </label>
        <input type="text" name="work" class="inputdiv" >
    </div>
    <div class="inputdiv">
        <label>Interests :</label>
        <input type="text" name="interest" class="inputdiv" >
    </div>
    <div class="inputdiv">
        <label>About Yourself :</label>
        <textarea name="about" class="inputdiv"></textarea>
    </div>
    <div class="inputdiv">
        <button type="submit" class="btn" name="updateprofile">Update</button>
    </div>
</form>
</div>
</body>
</html>

<?php
if(isset($_POST['updateprofile'])){
    $work=$_POST['work'];
    $interests=$_POST['interest'];
    $about=$_POST['about'];
    if(isset($_FILES['image']) && $_FILES['image']['size']>0) {
        $tempName = $_FILES['image']['tmp_name'];
        $fp = fopen($tempName, 'r');
        $data = fread($fp, filesize($tempName));
        $data = addslashes($data);
        fclose($fp);
        $query = "UPDATE profiles SET image='$data',work='$work',interests='$interests',about='$about' where UserName='$username'";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
    }
    ?>
    <script type="text/javascript">
        alert("Update Successfull.");
        window.location ="premiumuserindex.php";
    </script>

    <?php
    header('location: premiumuserindex.php');
}
?>
