<?php

require_once 'src/VideogameModel.php';
require_once 'src/PlatformsModel.php';
require_once 'src/PlatformsViewHelper.php';

$db = new PDO('mysql:host=db; dbname=project', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$platformModel = new PlatformsModel($db);
$platforms = $platformModel->getAllPlatforms();

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $release_year = $_POST['release_year'];
    $platform_id = (int)$_POST['platform_id'];

    if (!is_numeric($release_year) || strlen($release_year) !== 4) {
        $errorMessage = "Invalid release year.";
    }

    $videogameModel = new VideogamesModel($db);

    $result = $videogameModel->addVideogame($name, $release_year, $platform_id);
    $indexUrl = 'index.php';

    if ($result) {
        header("Location: $indexUrl");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>AddGame</title>
</head>

<body>

    <div class="nav-bar">
        <nav>
            <a href="index.php">Home</a>
            <a href="AddVideogame.php">AddGame</a>
            <a href="DeletedVideogames.php">RestoreGame</a>
        </nav>
    </div>

    <div class="form-container">
        <form method="post" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required pattern="[A-Za-z0-9\s:']+" title="Please enter a valid name (letters, numbers and spaces only)">

            <label for="release_year">Release Year:</label>
            <input type="text" id="release_year" name="release_year" required pattern="\d{4}" title="<?php echo htmlspecialchars($errorMessage); ?>">

            <label for="platform_id">Platform:</label>
            <select id="platform_id" name="platform_id" required>
                <?php
                echo PlatformsViewHelper::generatePlatformOptions($platforms);
                ?>
            </select>

            <button type="submit">Add Videogame</button>
        </form>
    </div>

</body>

</html>