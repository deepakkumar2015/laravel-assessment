@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="col-lg-12">
            <h2 class="pull-left">All Teams</h2>
            @if(\Auth::check())
            <a class="align-right btn add_team" style="float:right" href="{{ route('teams.create') }}">
                {{ __('Add Team') }}
            </a>
            @endif
        </div>
    </div>
</div>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Identifier</th>
        <th>Name</th>
        <th width="280px">Logo URL</th>
    </tr>
    @foreach ($allTeams as $team)
        <tr>
            <td><?= ++$i ?></td>
            <td><?= $team->identifier ?></td>
            <td><a href="{{ url('/players/' . $team->id) }}"><?= $team->name ?></a></td>
            <td><img width="100" height="100" src="<?= $team->logoUri ?>"/></td>
            @if(\Auth::check())
                <td>
                    <a class="btn btn-primary" href="{{ route('teams.edit',$team->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['teams.delete', $team->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            @endif
        </tr>
    @endforeach
</table>
@endsection