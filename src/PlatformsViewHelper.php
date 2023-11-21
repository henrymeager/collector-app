<?php

require_once 'Videogame.php';

class PlatformsViewHelper
{
    public static function generatePlatformOptions(array $platforms): string
    {
        $options = '';
        foreach ($platforms as $platform) {
            $options .= "<option value=\"{$platform['id']}\">{$platform['name']}</option>";
        }
        return $options;
    }
}