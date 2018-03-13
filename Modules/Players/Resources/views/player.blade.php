@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ $teamName ? 'Players assigned to Team: ' . $teamName : 'All Players' }}</h2>
            @if(\Auth::check())
                <a class="align-right btn add_team" style="float:right" href="{{ route('players.create') }}">
                    {{ __('Add Player') }}
                </a>
            @endif
        </div>
    </div>
</div>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Identifier</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th width="280px">Image</th>
    </tr>
    @foreach ($allPlayers as $player)
        <tr>
            <td><?= ++$i ?></td>
            <td><?= $player->identifier ?></td>
            <td><?= $player->first_name ?></td>
            <td><?= $player->last_name ?></td>
            <td><img width="100" height="100" src="<?= $player->image_uri ?>"/></td>
            @if(\Auth::check())
                <td>
                    <a class="btn btn-primary" href="{{ route('players.edit',$player->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['players.delete', $player->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            @endif
        </tr>
    @endforeach
</table>
@endsection