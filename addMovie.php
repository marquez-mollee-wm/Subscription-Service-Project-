<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Visual - Add Your Fave Movie</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h2>Visual - Add Your Fave Movie</h2>
<?php
define('GW_UPLOADPATH', 'images/');
define('GW_MAXFILESIZE','100000000' );
if (isset($_POST['submit'])) {

    // Grab the score data from the POST
    $movieName = $_POST['movieName'];
    $description = $_POST['description'];
    $moviePic = $_FILES['moviePic'] ['name'];
    $moviePicSize = $_FILES ['moviePic'] ['size'];
    $moviePicType = $_FILES ['moviePic'] ['type'];





    if (!empty($movieName) && !empty($description) && !empty($moviePic)) {

        if(($moviePicType == 'image/gif') || ($moviePicType== 'image/jpeg') ||
            ($moviePicType == 'image/pjpeg') || ($moviePicType == 'image/png') &&
            ($moviePicSize > 0) && ($moviePicSize <= GW_MAXFILESIZE)){

            $target = GW_UPLOADPATH . $moviePic;

            if ( move_uploaded_file ($_FILES['moviePic'] ['tmp_name'], $target)) {
                $movieName = $_POST['movieName'];
                $description = $_POST['description'];

                if (!empty($movieName) && !empty($description)) {
                    // Connect to the database
                    $dbh = new PDO('mysql:host=localhost;dbname=visual', 'root', 'root');

                    // Write the data to the database
                    $query = "INSERT INTO movies ( movieName, description, moviePic) VALUES (  :movieName, :description, :moviePic)";
                    $stmt = $dbh->prepare($query);
                    $result = $stmt->execute(
                        array(
                            'movieName' => $movieName,
                            'description' => $description,
                            'moviePic' => $moviePic

                        ));

                    // Confirm success with the user
                    echo '<p>Thanks for the movie suggestion!</p>';
                    echo '<p><strong>Movie Title:</strong>' . $movieName . '<br />';
                    echo '<strong>Description:</strong>' . $description . '</p>';
                    echo '<td><img src="'. GW_UPLOADPATH . $moviePic .'" alt="Movie image" /></td></tr>';
                    echo '<p><a href="index.php">&lt;&lt; Back to Visuals</a></p>';

                    // Clear the score data to clear the form


                } else {
                    echo '<p class="error">Please enter all of the information to add your high score.</p>';
                }
            }
        }
    }
}

$movieName = $_POST['movieName'] = null;
$description = $_POST['description'] = null;

?>

<hr />
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
    <label for="name">Movie Title:</label>
    <input type="text" id="name" name="movieName" value="<?php if (!empty($movieName)) echo $movieName; ?>" /><br />
    <label for="score">Description:</label>
    <input type="text" id="score" name="description" value="<?php if (!empty($description)) echo $description; ?>" />
    <label for="screenshot">Movie Image:</label>
    <input type="file" id="screen" name="moviePic" />
    <hr />
    <input type="submit" value="Add" name="submit" />
</form>
</body>
</html>
