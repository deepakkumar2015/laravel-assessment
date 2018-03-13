@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Player</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('players.get') }}"> Back</a>
        </div>
    </div>
</div>

@if(\Auth::check())
<div class="row col-md-6">
    <form method="POST" action="{{ route('players.save') }}">
        {!! csrf_field() !!}
        <div class="form-group">
            Teams:
            {{ Form::select('team', $allTeams) }}
            @if ($errors->has('team'))
                <span class="invalid-feedback">
                    <strong><?= $errors->first('team') ?></strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            Identifier:
            <input type="text" name="identifier" id="identifier" class="form-control{{ $errors->has('identifier') ? ' is-invalid' : '' }}">
            @if ($errors->has('identifier'))
                <span class="invalid-feedback">
                    <strong><?= $errors->first('identifier') ?></strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            First Name:
            <input type="text" name="first_name" id="first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}">
            @if ($errors->has('first_name'))
                <span class="invalid-feedback">
                    <strong><?= $errors->first('first_name') ?></strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            Last Name:
            <input type="text" name="last_name" id="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}">
            @if ($errors->has('last_name'))
                <span class="invalid-feedback">
                    <strong><?= $errors->first('last_name') ?></strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            Image:
            <input type="text" name="image_uri" id="image_uri" class="form-control{{ $errors->has('image_uri') ? ' is-invalid' : '' }}">
            @if ($errors->has('image_uri'))
                <span class="invalid-feedback">
                    <strong><?= $errors->first('image_uri') ?></strong>
                </span>
            @endif
        </div>

        <div>
            <button type="submit">Save</button>
        </div>
    </form>
</div>
@endif
@endsection

