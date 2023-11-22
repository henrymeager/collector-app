<?php

require_once 'Videogame.php';
require_once 'PlatformsModel.php';

class VideogamesModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllVideogames(): array
    {
        $query = $this->db->prepare('SELECT videogames.*, platforms.name AS platform_name FROM videogames
                                LEFT JOIN platforms ON videogames.platform_id = platforms.id
                                WHERE videogames.is_deleted = 0;');
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


    public function getVideogamesByPlatform(int $platform_id)
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

    public function addVideogame(string $name, int $release_year = null, int $platform_id = null): bool
    {
        $videogameInsertQuery = $this->db->prepare("INSERT INTO `videogames`(name, release_year, platform_id)
             VALUES (:name, :release_year, :platform_id)");

        $videogameInsertQuery->bindParam(':name', $name);
        $videogameInsertQuery->bindParam(':release_year', $release_year);
        $videogameInsertQuery->bindParam(':platform_id', $platform_id);

        return $videogameInsertQuery->execute();
    }

    public function getVideogameById($id)
    {
        $query = "SELECT * FROM videogames WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
}
