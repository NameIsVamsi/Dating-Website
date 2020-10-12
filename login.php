<?php include('server.php') ?>
<!--Simple login form-->
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
    <h2>Login</h2>
</div>

<form method="post" action="login.php" class="formclass">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" >
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
        Not yet a member? <a href="register.php" style="color: #5F9EA0"><u>Sign up</u></a>
    </p>
</form>
</body>
</html>