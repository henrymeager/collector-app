<?php

require_once 'src/Videogame.php';

class VideogamesViewHelper
{
    public static function displaySingleVideogame(Videogame $videogames): string
    {
        $output = '<div>';
        $output .= "<h1>$videogames->name</h1>";
        $output .= "<p>$videogames->id</p>";
        $output .= "<p>$videogames->release_year</p>";
        $output .= "<p>$videogames->platform_name</p>";
        $output .= '</div>';

        return $output;
    }

    public static function displayAllVideogames(array $videogames): string
    {
        $output = '';

        foreach ($videogames as $videogame) {
            echo '<div class="grid-item">';
            echo '<h3>' . $videogame->name . '</h3>';
            echo '<p>Release Year: ' . $videogame->release_year . '</p>';
            echo '<p>Platform: ' . $videogame->platform_name . '</p>';
            echo '</div>';
        }

        return $output;
    }
}
