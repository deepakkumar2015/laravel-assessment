@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Team</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('teams.get') }}"> Back</a>
        </div>
    </div>
</div>

@if(\Auth::check())
<div class="row col-md-6">
    <form method="POST" action="{{ route('teams.save') }}">
        {!! csrf_field() !!}
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
            Name:
            <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong><?= $errors->first('name') ?></strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            Logo URI:
            <input type="text" name="logoUri" id="logoUri" class="form-control{{ $errors->has('logoUri') ? ' is-invalid' : '' }}">
            @if ($errors->has('logoUri'))
                <span class="invalid-feedback">
                    <strong><?= $errors->first('logoUri') ?></strong>
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

