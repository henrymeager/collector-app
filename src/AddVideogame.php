<?php

require_once 'VideogameModel.php';

$db = new PDO('mysql:host=db; dbname=project', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $release_year = $_POST['release_year'];
    $platform_id = $_POST['platform_id'];

    $videogameModel = new VideogamesModel($db);
    $result = $videogameModel->addVideogame($name, $release_year, $platform_id);

    if ($result) {
        header('Location: ../index.php');
        exit();
    } else {
        echo $error_message = 'Failed to add the videogame. Please try again.';
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
        <input type="text" id="name" name="name" required pattern="[A-Za-z\s]+" title="Please enter a valid name (letters and spaces only)">

        <label for="release_year">Release Year:</label>
        <input type="text" id="release_year" name="release_year" required pattern="\d{4}" title="Please enter a valid year">

        <label for="platform_id">Platform ID:</label>
        <input type="text" id="platform_id" name="platform_id" required pattern="[1-6]" title="Please enter a valid platform ID">

        <button type="submit">Add Videogame</button>
    </form>

</body>

</html>