<?php

require_once 'src/Videogame.php';

class VideogamesViewHelper
{
    public static function displaySingleVideogame(Videogame $videogame): string
    {
        $output = '<div class="grid-item">';
        $output .= '<h1>' . $videogame->name . '</h1>';
        $output .= '<p>Release Year: ' . $videogame->release_year . '</p>';
        $output .= '<p>Platform: ' . $videogame->platform_name . '</p>';
        $output .= '</div>';

        return $output;
    }

    public static function displayAllVideogames(array $videogames): string
    {
        $output = '';

        foreach ($videogames as $videogame) {
            $output .= '<div class="grid-item">';
            $output .= '<h3>' . $videogame->name . '</h3>';
            $output .= '<p>Release Year: ' . $videogame->release_year . '</p>';
            $output .= '<p>Platform: ' . $videogame->platform_name . '</p>';
            $output .= '</div>';
        }

        return $output;
    }
}
