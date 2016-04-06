<?php
$username = 'rock';
$password = 'roll';

if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])
    || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {

    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm= "Visual"');
    exit('<h2>Visual</h2> Sorry, you must enter a valid username and password to access this page');
}
