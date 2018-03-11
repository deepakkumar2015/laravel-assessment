<?php

namespace Modules\Players\Entities;

use Illuminate\Database\DatabaseManager;

class Player extends Model
{
    const TABLE = 'players';

    /**
     * @var \Illuminate\Database\Connection
     */
    private $database;

    /**
     * Player constructor.
     * @param DatabaseManager $database
     */
    public function __construct(DatabaseManager $database)
    {
        $this->database = $database->connection();
    }

    /**
     * @return array|static[]
     */
    public function getAllPlayers()
    {
        return $this
            ->database
            ->table(self::TABLE)
            ->get();
    }
}
