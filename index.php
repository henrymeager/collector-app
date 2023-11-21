<?php

require_once 'src/VideogameModel.php';
require_once 'src/VideogameViewHelper.php';

$db = new PDO('mysql:host=db; dbname=project', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$videogamesModel = new VideogamesModel($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_button'])) {
    if (isset($_POST['videogame_id'])) {
        $videogame_id = (int)$_POST['videogame_id'];

        $stmt = $db->prepare("UPDATE videogames SET is_deleted = 1 WHERE id = ?");
        $stmt->execute([$videogame_id]);
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
    <title>Videogame Collector's Site</title>
</head>

<body>

    <div class="nav-bar">
        <nav>
            <a href="src/addVideogame.php">Add new game</a>
        </nav>
    </div>

    <div class="grid-container">
        <?php
        echo VideogamesViewHelper::displayAllVideogames($allVideogames);
        ?>
    </div>
</body>

</html>
