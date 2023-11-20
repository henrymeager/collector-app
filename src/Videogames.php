<?php

readonly class Videogames
{
    // Creating properties to contain the data for a product
    // matching them up with the columns in the products table
    public string $name;
    public int $id;
    public int $release_year;
    public int $platform_id;

    // The constructor allows us to pass the data in when we instantiate a new Product
    // using new Product()
    public function __construct(
        string $name,
        int $id, 
        int $release_year,
        int $platform_id
    ) {
        $this->name = $name;
        $this->id = $id;
        $this->release_year = $release_year;
        $this->platform_id = $platform_id;
    }
}