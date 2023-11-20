<?php

require_once 'src/Videogame.php';

class VideogamesModel
{
    public PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllVideogames(): array
    {
        $query = $this->db->prepare('SELECT videogames.*, platforms.name AS platform_name FROM videogames
                                LEFT JOIN platforms ON videogames.platform_id = platforms.id;');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $videogameObj = [];

        foreach ($result as $row) {
            $videogameObj[] = new Videogame(
                $row['name'],
                $row['id'],
                $row['release_year'],
                $row['platform_id'],
                $row['platform_name']
            );
        }
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

    function addVideogame($db, $name, $id, $release_year, $platform_id, $platform_name)
    {
        $videogameInsertQuery = $db->prepare("INSERT INTO `videogames`(name, id, release_year, platform_id, platform_name)
         VALUES (:name, :id, :release_year, :platform_id, :platform_name)");
        $videogameInsertQuery->bindParam(':name', $name);
        $videogameInsertQuery->bindParam(':id', $id);
        $videogameInsertQuery->bindParam(':release_year', $release_year);
        $videogameInsertQuery->bindParam(':platform_id', $platform_id);
        $videogameInsertQuery->bindParam(':platform_name', $platform_name);

        return $videogameInsertQuery->execute();
    }
}
