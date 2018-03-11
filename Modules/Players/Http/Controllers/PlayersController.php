<?php

namespace Modules\Players\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Players\Entities\Player;
use Illuminate\Contracts\Routing\ResponseFactory;

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

    /**
     * PlayersController constructor.
     * @param Player $player
     * @param $response
     */
    public function __construct(Player $player, ResponseFactory $response)
    {
        $this->player = $player;
        $this->response = $response;
    }

    /**
     * @return mixed
     */
    public function getPlayers()
    {
        $data = [
            'status' => 'success'
        ];
        $data['data'] = $this->player->getAllPlayers();

        return $this->response->json($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('players::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('players::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('players::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
