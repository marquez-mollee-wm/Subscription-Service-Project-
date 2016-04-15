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
</head>
<style>
    html{
        background: url("images/signIn.jpg") no-repeat center center fixed;
        background-size: cover;
    }
</style>
<body>

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

    <!--FOOTER-->
    <footer>
        <div class="copyright">
            <p>&copy 2016 - Visual,Inc. All Rights Reserved</p>
        </div>
        <div class="logo1">

        </div>
        <div class="links">
            <a href="index.php">Home</a>
            <a href="">About Us</a>
        </div>
    </footer>
</body>
</html>
