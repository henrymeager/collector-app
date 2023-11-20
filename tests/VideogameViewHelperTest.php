<?php

use PHPUnit\Framework\TestCase;

class VideogamesViewHelperTest extends TestCase
{
    public function testDisplayAllVideogames()
    {
        $videogames = [
            (object)['name', 'Game 1', 'release_year', 2007, 'platform_name', 'PC'],
            (object)['name', 'Game 2', 'release_year', 1390, 'platform_name', 'PS3'],
        ];

        $output = VideogamesViewHelper::displayAllVideogames($videogames);

        $expectedOutput =
        '<div class="grid-item">
        <h3>Game 1</h3>
        <p>Release Year: 2007</p>
        <p>Platform: PC</p>
        </div>
        
        <div class="grid-item">
        <h3>Game 2</h3>
        <p>Release Year: 1390</p>
        <p>Platform: PS3</p>
        </div>';

        $this->assertEquals($expectedOutput, $output);
    }
}
