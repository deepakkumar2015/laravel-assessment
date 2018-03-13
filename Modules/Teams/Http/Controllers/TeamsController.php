<?php

namespace Modules\Teams\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Modules\Teams\Entities\Team;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;

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
     * Show the form for creating a new resource.
     * @return Response
     */
    public function get(Request $request)
    {
        $allTeams = $this->team->getAllTeams();

        return view('teams::team', compact('allTeams'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Get Teams List API
     * @param $teamId
     * @return mixed
     */
    public function getTeams($teamId = null)
    {
        $data = [
            'status' => 'success'
        ];

        if ($teamId) {
            return $this->response->json($this->team->getAllTeams($teamId));
        }

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
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($teamId)
    {
        $oneTeam = $this->team->getTeamById($teamId);

        return view('teams::update', compact('oneTeam'));
    }

    /**
     * @param Request $request
     * @param $teamId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $teamId)
    {
        $validator = Validator::make($request->all(), [
            'identifier' => 'required',
            'name' => 'required',
            'logoUri' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('teams/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $inputData = $request->only(['identifier', 'name', 'logoUri']);
        $this->team->save($inputData, $teamId);
        return redirect()
            ->route('teams.edit',[$teamId])
            ->with('success','Team Updated successfully');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'identifier' => 'required',
            'name' => 'required',
            'logoUri' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('teams/create')
                ->withErrors($validator)
                ->withInput();
        }

        $inputData = $request->only(['identifier', 'name', 'logoUri']);
        $this->team->save($inputData);

        return redirect()
            ->route('teams.get')
            ->with('success','Team created successfully');
    }

    /*public function delete($teamId)
    {
        $this->team->delete($teamId);

        return redirect()->route('teams.get')
                         ->with('success','Team deleted successfully');
    }*/
}
