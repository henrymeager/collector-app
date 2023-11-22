<?php

require_once 'src/VideogameViewHelper.php';
require_once 'src/VideogameModel.php';
require_once 'src/PlatformsViewHelper.php';

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testDisplaySingleVideogame()
    {
        $videogame = new Videogame('Game 1', 1, 2007, 1, 'PC');

        $output = VideogamesViewHelper::displaySingleVideogame($videogame);

        $expectedOutput =
            '<div class="grid-item"><h1>Game 1</h1><p>Release Year: 2007</p><p>Platform: PC</p></div>';

        $this->assertEquals($expectedOutput, $output);
    }


    public function testDisplayAllVideogames()
    {
        $videogames = [
            new Videogame('Game 1', 1, 2007, 1, 'PC'),
            new Videogame('Game 2', 2, 1390, 2, 'PS3')
        ];

        $output = VideogamesViewHelper::displayAllVideogames($videogames);

        $expectedOutput = '<div class="grid-item"><h3>Game 1</h3><p>Release Year: 2007</p><p>Platform: PC</p></div><div class="grid-item"><h3>Game 2</h3><p>Release Year: 1390</p><p>Platform: PS3</p></div>';

        $this->assertEquals($expectedOutput, $output);
    }  

    public function testGeneratePlatformOptions()
    {
        $platforms = [
            ['id' => 1, 'name' => 'Platform 1'],
            ['id' => 2, 'name' => 'Platform 2'],
            ['id' => 3, 'name' => 'Platform 3'],
        ];

        $options = PlatformsViewHelper::generatePlatformOptions($platforms);

        $expectedOptions =
            "<option value=\"1\">Platform 1</option>" .
            "<option value=\"2\">Platform 2</option>" .
            "<option value=\"3\">Platform 3</option>";

        $this->assertEquals($expectedOptions, $options);
    }
}
