<?php

$db = new PDO('mysql:host=db; dbname=project', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

function getGameDataById($db, $game_id) {
    $query = "SELECT * FROM videogames WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $game_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateGameData($db, $game_id, $title, $description) {
    $query = "UPDATE videogames SET title = :title, description = :description WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $game_id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $game_id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    updateGameData($db, $game_id, $title, $description);

    header("Location: index.php");
    exit();
} elseif (isset($_GET['id'])) {
    $game_id = $_GET['id'];
    $gameData = getGameDataById($db, $game_id);

    if ($gameData) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Video Game</title>
        </head>
        <body>

        <form method="post" action="editvideogame.php">
            <input type="hidden" name="id" value="<?= $gameData['id'] ?>">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= $gameData['title'] ?>"><br>
            <label for="description">Description:</label>
            <textarea id="description" name="description"><?= $gameData['description'] ?></textarea><br>
            <button type="submit" name="update_button">Update</button>
        </form>

        </body>
        </html>
        <?php
    } else {
        echo 'Game not found';
    }
} else {
    echo 'Invalid request';
}
?>
