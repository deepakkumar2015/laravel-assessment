@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Team</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('teams.get') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row col-md-6">
        <form method="PATCH" action="{{ route('teams.update', $oneTeam->id) }}">

            <div class="form-group">
                Identifier:
                <input type="text" name="identifier" id="identifier"
                       value="{{ $oneTeam->identifier ? $oneTeam->identifier : '' }}"
                       class="form-control{{ $errors->has('identifier') ? ' is-invalid' : '' }}">
                @if ($errors->has('identifier'))
                    <span class="invalid-feedback">
                    <strong><?= $errors->first('identifier') ?></strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                Name:
                <input type="text" name="name" id="name"
                       value="{{ $oneTeam->name ? $oneTeam->name : '' }}"
                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                    <strong><?= $errors->first('name') ?></strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                Logo URI:
                <input type="text" name="logoUri" id="logoUri"
                       value="{{ $oneTeam->logoUri ? $oneTeam->logoUri : '' }}"
                       class="form-control{{ $errors->has('logoUri') ? ' is-invalid' : '' }}">
                @if ($errors->has('logoUri'))
                    <span class="invalid-feedback">
                    <strong><?= $errors->first('logoUri') ?></strong>
                </span>
                @endif
            </div>

            <div>
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection