<?php

/**
 * This file represents our home page, it's where use all of our objects to
 * display the page
 */


// Require in any of the classes we need to use
require_once 'src/VideogamesModel.php';
require_once 'src/VideogamesViewHelper.php';

// Created a DB connection
$db = new PDO('mysql:host=db; dbname=project', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// We need to get some products to display them, so we use the ProductModel
// which already has all the code we need
$videogamesModel = new VideogamesModel($db); // We pass $db in, a Model needs a database connection
// in order to do it's job

// And now we can use our model to run any DB queries we need - getting all products
// in this case
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
    <div class="grid-container">
        <?php
        foreach ($videogames as $videogame) {
            echo '<div class="grid-item">';
            echo '<h3>' . $videogame->name . '</h3>';
            echo '<p>Release Year: ' . $videogame->release_year . '</p>';
            echo '<p>Platform: ' . $videogame->platform_name . '</p>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>




