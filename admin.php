<?php
require_once('authorize.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Visual - Movie Admission</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php

// Connect to the database
$dbh = new PDO('mysql:host=localhost;dbname=visual', 'root', 'root');
// Retrieve the score data from MySQL
$query = "SELECT * FROM movies ";
$stmt= $dbh->prepare($query);
$stmt->execute();
$result= $stmt->fetchAll();
// Loop through the array of score data, formatting it as HTML
echo '<table>';
foreach ($result as $row) {
    // Display the score data
    echo '<tr><td><strong>' . $row['movieName'] . '</strong></td>';
    echo '<td>' . $row['moviePic'] . '</td>';
    echo '<td>' . $row['description'] . '</td>';
    echo '<td><a href="removeMovie.php?idmovies=' . $row['idmovies'] .
        '&amp;movieName=' . $row['movieName'] . '&amp;description=' . $row['description'] .
        '&amp;moviePic=' . $row['moviePic'] . '">Remove</a></td>';

    if( $row['approve'] == '0'){
        echo '<td> / <a href="approveMovie.php?idmovies='. $row['idmovies'] .
            '&amp;movieName='. $row['movieName']. '&amp;description='. $row['description'] . '&amp;moviePic=' .
            $row['moviePic'] . '">Approve</a></td></tr>';
    }
}

echo '</table>';

?>
​
</body>
</html>
