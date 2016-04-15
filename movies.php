<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Guitar Wars - High Scores</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php
define('GW_UPLOADPATH', 'images/');
// Connect to the database
$dbh = new PDO('mysql:host=localhost;dbname=visual', 'root', 'root');

// Retrieve the score data from MySQL
$query = "SELECT * FROM visual WHERE approved == 1 ";
$stmt = $dbh->prepare($query);
$result = $stmt->execute();

$movie = $stmt->fetchall();

// Loop through the array of score data, formatting it as HTML
echo '<table>';


foreach ($movie as $row) {



    $filepath = GW_UPLOADPATH . $row['moviePic'];
    // Display the score data
    echo '<tr><td class="movieInfo">';
    echo '<strong>Name:</strong> ' . $row['movieName'] . '<br />';
    echo '<strong>Description:</strong> ' . $row['description'] . '</td></tr>';


    if (is_file($filepath) && filesize($filepath) > 0) {
        echo '<td><img src="'.$filepath.'" alt="Movie image"/></td></tr>';
    }

    else{
        echo '<td><img src="images/noimage.jpeg" alt="no image available"/></td></tr>';
    }
}
echo '</table>';




?>
</body>
</html>