<?php

namespace Modules\Players\Entities;

use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    const TABLE = 'players';
    const TABLE_TEAMS = 'teams';

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
    public function getAllPlayers($teamId = null)
    {
        if ($teamId) {
            return $this
                ->database
                ->table(self::TABLE)
                ->where('team_id', $teamId)
                ->get();
        }

        return $this
            ->database
            ->table(self::TABLE)
            ->get();
    }
}
