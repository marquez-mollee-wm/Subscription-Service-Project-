<?php
require_once('connect.php');
$error = false;
$success = false;

session_start();

if($_POST['addUser']) {


    $stmt = $dbh->prepare('INSERT INTO users (

              username,
              password,
              firstname,
              lastname,
              email,
              address,
              aptnum,
              zip,
              city,
              state,
              phone,
              creditcard,
              cvc,
              expdate)
            VALUES (
              :username,
              :pass,
              :firstName,
              :lastName,
              :email,
              :address,
              :aptNum,
              :zip,
              :city,
              :state,
              :phone,
              :creditCard,
              :cvc,
              :expDate)');
    $result = $stmt->execute(
        array(
            'username' => $_POST['username'],
            'pass' => $_POST['password'],
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'aptNum' => $_POST['aptNum'],
            'zip' => $_POST['zip'],
            'city' => $_POST['city'],
            'state' => $_POST['state'],
            'phone' => $_POST['phone'],
            'creditCard' => $_POST['creditCard'],
            'cvc' => $_POST['CVC'],
            'expDate' => $_POST['expDate']
        )
    );

    if ($result) {
        $success = $_POST['username'] . " was successfully saved.";
        header("Location: test.php");
    } else {
        $success = "There was an error saving " . $_POST['username'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>register</title>
    <link  rel="stylesheet" type="text/css" href="registerStyle.css">
    <script type="text/javascript" script-name="holtwood-one-sc" src="http://use.edgefonts.net/holtwood-one-sc.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="registerScript.js"></script>
</head>
<body>

<div id="scroll-animate">
    <div id="scroll-animate-main">
        <div class="wrapper-parallax">

            <header>
                <h1>Register</h1>
            </header>
            <div id="form" class="content"
            <form name="addUser" method="post">
                First Name
                <input type="text" placeholder="Mollee" class="enjoy-css" name="firstName">
                <br>
                Last Name
                <input type="text" placeholder="Marquez" class="enjoy-css" name="lastName">
                <br>
                Email
                <input type="email" placeholder="darkdevel@gmail.com" class="enjoy-css" name="email">
                <br>
                Username
                <input type="text" placeholder="iheartulongtime" class="enjoy-css" name="username">
                <br>
                Password
                <input type="password" class="enjoy-css" name="password">
                <br>
                Confirm Password
                <input type="password" class="enjoy-css" >
                <br>
                Birthday
                <input type="date" placeholder="dd/mm/yyyy" class="enjoy-css" name="birthday">
                <br>
                Address
                <input type="text" placeholder="00000 w Santa Ln." class="enjoy-css" name="address">
                <br>
                Suite #
                <input type="text" class="enjoy-css" name="aptNum">
                <br>
                City
                <input type="text" placeholder="Berkley" class="enjoy-css" name="city">
                <br>
                Zip Code
                <input type="text" placeholder="90210" class="enjoy-css" name="zip">
                <br>
                State
                <select class="enjoy-css" name="state">
                    <option>AL</option>
                    <option>AK</option>
                    <option>AR</option>
                    <option>AZ</option>
                    <option>CA</option>
                    <option>CO</option>
                    <option>CT</option>
                    <option>DE</option>
                    <option>FL</option>
                    <option>GA</option>
                    <option>IA</option>
                    <option>ID</option>
                    <option>IL</option>
                    <option>IN</option>
                    <option>KS</option>
                    <option>KY</option>
                    <option>LA</option>
                    <option>MA</option>
                    <option>MD</option>
                    <option>ME</option>
                    <option>MI</option>
                    <option>MN</option>
                    <option>MO</option>
                    <option>MS</option>
                    <option>MT</option>
                    <option>NC</option>
                    <option>ND</option>
                    <option>NE</option>
                    <option>NH</option>
                    <option>NJ</option>
                    <option>NM</option>
                    <option>NV</option>
                    <option>NY</option>
                    <option>OH</option>
                    <option>OK</option>
                    <option>OR</option>
                    <option>PA</option>
                    <option>RI</option>
                    <option>SC</option>
                    <option>SD</option>
                    <option>TN</option>
                    <option>TX</option>
                    <option>UT</option>
                    <option>VA</option>
                    <option>VT</option>
                    <option>WA</option>
                    <option>WI</option>
                    <option>WV</option>
                    <option>WY</option>
                </select>
                <br>
                Country
                <select class="enjoy-css" name="country">
                    <option>Canada</option>
                    <option>Ireland</option>
                    <option>England</option>
                    <option>Japan</option>
                    <option>Australia</option>
                    <option>New Zealand</option>
                    <option>Mexico</option>
                    <option>France</option>
                    <option>Italy</option>
                    <option>United States</option>
                </select>
                <br>
                Cell Number
                <input type="text" placeholder="(000)000-0000" class="enjoy-css" name="phone">
                <br>
                Credit Card Number
                <input type="text" placeholder="0000000000000000" class="enjoy-css" name="creditCard">
                <br>
                CVC
                <input type="text" placeholder="000" class="enjoy-css" name="CVC">
                <br>
                Expiration Date
                <input type="text" placeholder="mm/yy" class="enjoy-css" name="expDate">
                <br>

                <button type="submit" name="addUser" value="1">Submit</button>

            </form>
        </div>
        <footer>
            <div class="copyright">
                <p>&copy 2016 - Visual,Inc. All Rights Reserved</p>
            </div>
            <div class="logo">
                <img src="pics/logo.png">
            </div>
            <div class="links">
                <a href="home.php">Home</a>
                <a href="index.php">Sign-In</a>
                <a href="aboutUs.php">About Us</a>
            </div>
        </footer>
    </div>
</div>
</div>
</body>

