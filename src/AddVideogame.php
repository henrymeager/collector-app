<?php

require_once 'src/VideogameModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $releaseYear = $_POST['release_year'];
    $platformId = $_POST['platform_id'];

    $result = $videogamesModel->addVideogame($name, $releaseYear, $platformId);

    if ($result) {
        header('Location: index.php');
        exit();
    } else {

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Add Videogame</title>
</head>

<body>
    <h2>Add a new game</h2>

    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="release_year">Release Year:</label>
        <input type="text" id="release_year" name="release_year" required>

        <label for="platform_id">Platform ID:</label>
        <input type="text" id="platform_id" name="platform_id" required>

        <button type="submit">Add Videogame</button>
    </form>
</body>

</html>
