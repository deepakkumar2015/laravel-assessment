<?php

namespace Modules\Teams\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Teams\Entities\Team;

class TeamsController extends Controller
{
    //Class constants
    const NAME = 'Teams';

    /**
     * @var $team
     */
    private $team;

    /**
     * @var ResponseFactory
     */
    private $response;

    /**
     * PlayersController constructor.
     * @param ResponseFactory $response
     * @param Team $team
     */
    public function __construct(Team $team, ResponseFactory $response)
    {
        $this->team = $team;
        $this->response = $response;
    }

    /**
     * @return mixed
     */
    public function getTeams()
    {
        $data = [
            'status' => 'success'
        ];
        $data['data'] = $this->team->getAllTeams();

        return $this->response->json($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('teams::create');
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
        return view('teams::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('teams::edit');
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
