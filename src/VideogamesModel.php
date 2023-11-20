<?php

require_once 'src/Videogames.php';

// The job of a model is to handle database queries for a given thing.
// thing = database table
class VideogamesModel
{
    public PDO $db;
    // Dependency injection
    // If an object needs another object to do it's job, instead of instanting it here,
    // we pass the dependency in from outside
    // This is partly to follow single responsibility, it is not the job of a model
    // to create a database connection, just to use one.
    public function __construct(PDO $db) 
    {
        $this->db = $db;
    }

    public function getProductById(int $id): Videogames
    {
        $query = $this->db->prepare('SELECT * FROM `videogames` WHERE `id` = :id');
        $query->bindParam(':id', $id);
        $query->execute();
        $videogames = $query->fetch();
        // Taking the assoc array we get from fetch
        // And plugging the data into a Product entity object
        $videogameObj = new Videogames(
            $videogames['name'], 
            $videogames['id'], 
            $videogames['release_year'],
            $videogames['platform_id']
        );
        return $videogameObj;
    }

    public function getAllVideogames()
    {
        $query = $this->db->prepare('SELECT * FROM `videogames`;');
        $query->execute();
        $videogames = $query->fetchAll();

        $videogameObj = []; // Create a new empty array to contain
        // our Product objects
        foreach ($videogames as $videogame) {
            // For each product in the result, create a Product object
            // and put it into array
            $videogameObj[] = new Videogames(
                $videogame['name'], 
                $videogame['id'], 
                $videogame['release_year'],
                $videogame['platform_id']
            );
        }
        // Return the array of Product objects
        return $videogameObj;
    }

    public function getVideogamesByPlatform(int $platorm_id)
    {
        $query = $this->db->prepare(
            'SELECT * FROM `videogames` 
                WHERE `platform_id` = :platform_id;'
            );
        $query->bindParam(':platform_id', $platform_id);
        $query->execute();
        $videogame = $query->fetchAll();
        return $videogame;
    }

    // We would have any other Product query in this model

    // addProduct

    // updateProduct

    // deleteProduct

    // etc etc

}