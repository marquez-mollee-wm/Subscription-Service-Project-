<?php
session_start();

require_once('connect.php');

$error = false;
$success = false;

if(isset($_POST['login'])) {

    $query = $dbh->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $result = $query->execute(
        array(
            'username' => $_POST['username'],
            'password' => $_POST['password']
        )
    );
    $userinfo = $query->fetch();

    if ($userinfo) {

        $success = "User, " . $_POST['user'] . " was successfully logged in.";

        $_SESSION["firstName"] = $userinfo['firstname'];
        $_SESSION["userName"] = $userinfo['username'];

        header("Location: index.php");
    } else {
        $success = "There was an error logging into the account.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" script-name="aguafina-script" src="http://use.edgefonts.net/aguafina-script.js"></script>

</head>
<body>
<div class="signInContainer">
    <!--HEADER-->
    <header class="head">
        <h1>...</h1>
    </header>
    <!-- END HEADER-->
    <div class="box">

        <div class="rightside">
            <img src="http://41.media.tumblr.com/tumblr_l3bc6vSgcd1qbvsixo1_1280.jpg">
        </div>

        <div id="border">
            <header class="title">
                <h1>Sign-In</h1>
            </header>


            <div class="indexContent">
                <form  method='post' id="form2" class="navbar-form navbar-right" action="signIn.php">
                    <input type='text' name="username" id='username2' placeholder="Username" class="form-control">
                    <input type='password' name='password' id='password3' placeholder="Password" class="form-control">
                    <button type='submit' name='login' value='1'>Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!--FOOTER-->
    <footer>
        <div class="copyright">
            <p>&copy 2015 - modsupplies,Inc. All Rights Reserved</p>
        </div>
        <div class="logo1">
            <img src="pics/logo.png">
        </div>
        <div class="links">
            <a href="index.html">Home</a>
            <a href="signIn.php">Sign-In</a>
            <a href="">About Us</a>
        </div>
    </footer>
</body>
</html>
