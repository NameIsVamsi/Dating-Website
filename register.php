<?php include('server.php') ?>
<!--Simple registration form-->
<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="header.css">
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

<div class="miniheader">
    <h2>Register</h2>
</div>

<form method="post" action="register.php" class="formclass">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" value="<?php if (!empty($username)) {
            echo $username;
        } ?>">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php if (!empty($email)) {
            echo $email;
        } ?>">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password_1">
    </div>
    <div class="input-group">
        <label>Confirm password</label>
        <input type="password" name="password_2">
    </div>
    <div>
        <h4>Gender : </h4>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
    </div>
    <div>
        <h4>Premium : </h4>
        <input type="radio" id="yes" name="premium" value="yes">
        <label for="yes">YES</label><br>
        <input type="radio" id="no" name="premium" value="no">
        <label for="NO">NO</label><br>
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
        Already a member? <a href="login.php" style="color: #5F9EA0"><u>Sign in</u></a>
    </p>
</form>
</body>
</html>