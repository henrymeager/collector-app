<?php

require_once 'src/VideogameModel.php';
require_once 'src/VideogameViewHelper.php';

$db = new PDO('mysql:host=db; dbname=project', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$videogamesModel = new VideogamesModel($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_button'])) {
    if (isset($_POST['id'])) {
        $id = (int)$_POST['id'];

        $deleteGame = new VideogamesModel($db);
        $deleteGame->deleteVideoGame($id);
    }
}

$allVideogames = $videogamesModel->getAllVideogames();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="mediaqueries.css">
    <title>CollectorSite</title>
</head>

<body>

    <div class="nav-bar">
        <nav>
        <a href="index.php">Home</a>
            <a href="AddVideogame.php">AddGame</a>
            <a href="DeletedVideogames.php">RestoreGame</a>
        </nav>
    </div>

    <div class="grid-container">
        <?php
        echo VideogamesViewHelper::displayAllVideogames($allVideogames);
        ?>
    </div>
</body>

</html>
