<?php
require_once('admin.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>visuals - remove movies</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h2>Visuals - Remove Movies</h2>
​
<?php

define('GW_UPLOADPATH', 'images/');
define('GW_MAXFILESIZE','100000000' );


    $id = (@$_GET['idmovies']) ? $_GET['idmovies'] : $_POST['idmovies'];
    $movieName = (@$_GET['movieName']) ? $_GET['movieName'] : $_POST['movieName'];
    $description = (@$_GET['description']) ? $_GET['description'] : $_POST['description'];
    $moviePic = @$_GET['moviePic'];


if (isset($_POST['submit'])) {
    if ($_POST['confirm'] == 'Yes') {

        $dbh = new PDO('mysql:host=localhost;dbname=visual', 'root', 'root');
        // Delete the score data from the database
        $query = "DELETE FROM movies WHERE idmovies = $id LIMIT 1";
        $stmt = $dbh ->prepare($query);
        $stmt -> execute();
        $result = $stmt->fetchAll();
        // Confirm success with the user
        echo '<p>The movie ' . $movieName . ' was successfully removed.';
    }
    else {
        echo '<p class="error">The movie was not removed.</p>';
    }
}
else if (isset($id) && isset($movieName) && isset($description) ) {
    echo '<p>Are you sure you want to delete the following movie?</p>';
    echo '<p><strong>Movie Title: </strong>' . $movieName .
        '<br /><strong>Description: </strong>' . $description . '</p>';
    echo '<form method="post" action="removeMovie.php">';
    echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
    echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
    echo '<input type="submit" value="Submit" name="submit" />';
    echo '<input type="hidden" name="idmovies" value="' . $id . '" />';
    echo '<input type="hidden" name="movieName" value="' . $movieName. '" />';
    echo '<input type="hidden" name="description" value="' . $description . '" />';
    echo '</form>';
}

echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';
?>
​
</body>
</html>