<?php

namespace Modules\Teams\Entities;

use Modules\Players\Entities\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\DatabaseManager;

class Team extends Model
{
    const TABLE = 'teams';

    /**
     * @var \Illuminate\Database\Connection
     */
    private $database;

    private $player;

    /**
     * Team constructor.
     * @param DatabaseManager $database
     * @param Player $player
     */
    public function __construct(DatabaseManager $database, Player $player)
    {
        $this->database = $database->connection();
        $this->player = $player;
    }

    /**
     * @return array|static[]
     */
    public function getAllTeams($teamId = null)
    {
        if ($teamId) {
            return $this->getTeamById($teamId);
        }

        return $this
            ->database
            ->table(self::TABLE)
            ->get();
    }

    /**
     * @return array
     */
    public function getTeamNamesList()
    {
         $teams = $this
            ->database
            ->table(self::TABLE)
            ->select(['id', 'name'])
            ->get();

        $teamArr = $teams->keyBy('id')->transform(function ($item) {

            return $item->name;
        })->toArray();

        return $teamArr;
    }

    /**
     * @param $teamId
     * @return Model|null|object|static
     */
    public function getTeamById($teamId)
    {
        return $this
            ->database
            ->table(self::TABLE)
            ->where('id', $teamId)
            ->first();
    }

    /**
     * @param $teamId
     * @return \Illuminate\Support\Collection
     */
    public function getTeamNameById($teamId)
    {
        return $this
            ->database
            ->table(self::TABLE)
            ->where('id', $teamId)
            ->pluck('name');
    }

    /**
     * @param array $inputData
     * @return bool
     */
    public function save(array $inputData = [], $teamId = null)
    {
        $data = [
            "identifier" => $inputData["identifier"],
            "name"       => $inputData["name"],
            "logoUri"    => $inputData["logoUri"]
        ];

        if ($teamId) {
            return $this
                ->database
                ->table(self::TABLE)
                ->where('id', $teamId)
                ->update($data);
        }

        return $this
            ->database
            ->table(self::TABLE)
            ->insert($data);
    }

    /*public function delete($teamId)
    {
        return $this
            ->database
            ->table(self::TABLE)
            ->where('id', $teamId)
            ->delete();
    }*/
}
