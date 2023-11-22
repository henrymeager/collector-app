<?php

require_once 'Videogame.php';

class PlatformsModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllPlatforms(): array
    {
        $platformQuery = $this->db->query("SELECT `id`, `name` FROM platforms");
        $platforms = $platformQuery->fetchAll(PDO::FETCH_ASSOC);

        return $platforms;
    }
}
