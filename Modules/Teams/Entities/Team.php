<?php

namespace Modules\Teams\Entities;

use Illuminate\Database\DatabaseManager;

class Team extends Model
{
    const TABLE = 'teams';

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
    public function getAllTeams()
    {
        return $this
            ->database
            ->table(self::TABLE)
            ->get();
    }
}
