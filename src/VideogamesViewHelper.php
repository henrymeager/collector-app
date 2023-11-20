<?php

require_once 'src/Videogames.php';
/**
 * The job of a view helper is contain display functionality
 * for a given 'thing'
 */
class VideogamesViewHelper
{
    // because these methods do not use $this to refer to other methods or
    // properties - we declare them static.
    // as per the comment in index.php, we do not need to instantiate an object
    // in order to use these methods.
    // Also notice that we've been able to type hint by Product, meaning we know
    // exactly what data is available to us inside of this method
    public static function displaySingleVideogame(Videogames $videogames): string
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
        // Because this method is dealing with multiple products, we need to loop through
        // them to generate each products HTML one at a time
        foreach ($videogames as $videogame) {
            // Here we 'glue' each product's HTML into an $output variable
            // to build up all of the HTML for every product into a single variable
            $output .= '<div>';
            $output .= "<h1>Name: $videogame->name</h1>";
            $output .= "<p>Year of release: $videogame->release_year</p>";
            $output .= "<p>Platform: $videogame->platform_name</p>";
            $output .= '</div>';
        }

        return $output;
    }
}