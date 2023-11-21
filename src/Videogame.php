<?php

readonly class Videogame
{
    public string $name;
    public int $id;
    public int $release_year;
    public int $platform_id;
    public string $platform_name;

    public function __construct(
        string $name = '',
        int $id = 0,
        int $release_year = 0,
        int $platform_id = 0,
        ?string $platform_name = 'N/A'
    ) {
        $this->name = $name;
        $this->id = $id;
        $this->release_year = $release_year;
        $this->platform_id = $platform_id;
        $this->platform_name = $platform_name ?? 'N/A';
    }
}
