<?php

require_once 'src/VideogameModel.php';
require_once 'src/VideogameViewHelper.php';

$db = new PDO('mysql:host=db; dbname=project', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$videogamesModel = new VideogamesModel($db);

$videogames = $videogamesModel->getAllVideogames();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="mediaqueries.css">
    <title>Videogame Collector's Site</title>
</head>

<body>

    <div class="nav-bar">
        <nav>
            <a href="AddVideoGame.php">Add new game</a>
        </nav>
    </div>

    <div class="grid-container">
        <?php
        $allVideogames = $videogamesModel->getAllVideogames();
        echo VideogamesViewHelper::displayAllVideogames($allVideogames);
        ?>
    </div>
</body>

</html>