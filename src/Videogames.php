<?php

readonly class Videogames
{
    public string $name;
    public int $id;
    public int $release_year;
    public int $platform_id;
    public string $platform_name;

    public function __construct(
        string $name,
        int $id,
        int $release_year,
        int $platform_id,
        string $platform_name
    ) {
        $this->name = $name;
        $this->id = $id;
        $this->release_year = $release_year;
        $this->platform_id = $platform_id;
        $this->platform_name = $platform_name;
    }
}
