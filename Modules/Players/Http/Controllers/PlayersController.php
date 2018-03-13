<?php

namespace Modules\Players\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Players\Entities\Player;
use Illuminate\Contracts\Routing\ResponseFactory;
use Modules\Teams\Entities\Team;

class PlayersController extends Controller
{
    //Class constants
    const NAME = 'Players';

    /**
     * @var $player
     */
    private $player;

    /**
     * @var ResponseFactory
     */
    private $response;

    private $team;

    /**
     * PlayersController constructor.
     * @param Player $player
     * @param $response
     */
    public function __construct(Player $player, ResponseFactory $response, Team $team)
    {
        $this->player = $player;
        $this->response = $response;
        $this->team = $team;
    }

    /**
     * @param Request $request
     * @param null $teamId
     * @return $this
     */
    public function get(Request $request, $teamId = null)
    {
        $allPlayers = $this->player->getAllPlayers();
        $teamName = '';

        if (! empty($teamId)) {
            $allPlayers = $this->player->getAllPlayers($teamId);
            $teamName   = $this->team->getTeamNameById($teamId)[0];
        }

        return view('players::player', compact('allPlayers', 'teamName'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * @return mixed
     */
    public function getPlayers()
    {
        $data = ['status' => 'success'];
        $data['data'] = $this->player->getAllPlayers();

        return $this->response->json($data);
    }


    /**
     * Create Player view action
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $allTeams = $this->team->getTeamNamesList();

        return view('players::create', compact('allTeams'));
    }

    /**
     * Store a new player.
     * @param  Request $request
     * @return Response
     */
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'team' => 'required',
            'identifier' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'image_uri' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('players/create')
                ->withErrors($validator)
                ->withInput();
        }

        $inputData = $request->only(['team', 'identifier', 'first_name', 'last_name', 'image_uri']);
        $this->player->save($inputData);

        return redirect()
            ->route('players.get')
            ->with('success','Player created successfully');
    }

    /**
     * Edit player view page action
     * @param $playerId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($playerId)
    {
        $allTeams = $this->team->getTeamNamesList();
        $onePlayer = $this->player->getPlayerById($playerId);

        return view('players::update', compact('onePlayer', 'allTeams'));
    }

    /**
     * Update Players
     * @param Request $request
     * @param $playerId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $playerId)
    {
        $validator = Validator::make($request->all(), [
            'team' => 'required',
            'identifier' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'image_uri' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('players/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $inputData = $request->only(['team', 'identifier', 'first_name', 'last_name', 'image_uri']);
        $this->player->save($inputData, $playerId);

        return redirect()
            ->route('players.edit',[$playerId])
            ->with('success','Player Updated successfully');
    }

    /*public function delete($playerId)
    {
        $this->team->delete($playerId);

        return redirect()->route('players.get')
                         ->with('success','Team deleted successfully');
    }*/
}
