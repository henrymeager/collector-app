<?php

require_once 'src.Videogame.php';

if (isset($_GET['id'])) {
    $game_id = $_GET['id'];

    $query = "SELECT * FROM videogames WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $game_id);
    $stmt->execute();

    $gameData = $stmt->fetch(PDO::FETCH_ASSOC);

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Video Game</title>
    </head>
    <body>

    <form method="post" action="updatevideogame.php">
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
    echo 'Invalid request';
}
?>
