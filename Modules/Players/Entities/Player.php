<?php

namespace Modules\Players\Entities;

use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    const TABLE       = 'players';
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
     * @param null $teamId
     * @return \Illuminate\Support\Collection
     */
    public function getAllPlayers($teamId = null)
    {
        $query = $this
            ->database
            ->table(self::TABLE);

        if ($teamId) {
            return $query
                ->where('team_id', $teamId)
                ->get();
        }

        return $query->get();
    }

    /**
     * @param array $inputData
     * @param null $playerId
     * @return bool|int
     */
    public function save(array $inputData = [], $playerId = null)
    {
        $data = [
            "identifier" => $inputData["identifier"],
            "first_name" => $inputData["first_name"],
            "last_name"  => $inputData["last_name"],
            "image_uri"  => $inputData["image_uri"],
            "team_id"    => $inputData["team"]
        ];

        if ($playerId) {
            return $this
                ->database
                ->table(self::TABLE)
                ->where('id', $playerId)
                ->update($data);
        }

        return $this
            ->database
            ->table(self::TABLE)
            ->insert($data);
    }

    /**
     * @param $playerId
     * @return Model|null|object|static
     */
    public function getPlayerById($playerId)
    {
        return $this
            ->database
            ->table(self::TABLE)
            ->where('id', $playerId)
            ->first();
    }

    /*public function delete($playerId)
    {
        return $this
            ->database
            ->table(self::TABLE)
            ->where('id', $playerId)
            ->delete();
    }*/
}
