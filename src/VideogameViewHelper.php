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

            $output .= "<form method='post' action=''>";
            $output .= '<input type="hidden" name="id" value="' . $videogame->id . '">';
            $output .= '<button type="submit" name="edit_button">Edit</button>';
            $output .= '</form>';
    
            $output .= "<form method='post' action=''>";
            $output .= '<input type="hidden" name="id" value="' . $videogame->id . '">';
            $output .= '<button type="submit" name="delete_button">Delete</button>';
            $output .= '</form>';
    
            $output .= '</div>';
        }

        return $output;
    }

    public static function displayAllDeletedVideogames(array $videogames): string
    {
        $output = '';

        foreach ($videogames as $videogame) {
            $output .= '<div class="grid-item">';
            $output .= '<h3>' . $videogame->name . '</h3>';
            $output .= '<p>Release Year: ' . $videogame->release_year . '</p>';
            $output .= '<p>Platform: ' . $videogame->platform_name . '</p>';

            $output .= "<form method='post' action=''>";
            $output .= '<input type="hidden" name="id" value="' . $videogame->id . '">';
            $output .= '<button type="submit" name="edit_button">Edit</button>';
            $output .= '</form>';
    
            $output .= "<form method='post' action=''>";
            $output .= '<input type="hidden" name="id" value="' . $videogame->id . '">';
            $output .= '<button type="submit" name="restore_button">Restore</button>';
            $output .= '</form>';
    
            $output .= '</div>';
        }

        return $output;
    }
}
