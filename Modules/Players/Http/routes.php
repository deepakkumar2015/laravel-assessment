<?php
Route::group(
    [
        'middleware' => 'web',
        'prefix' => 'players',
        'namespace' => 'Modules\Players\Http\Controllers'
    ], function() {
        Route::get('create', ['as' => 'players.create', 'uses' => 'PlayersController@create']);
        Route::get('/{teamId?}', ['as' => 'players.get', 'uses' => 'PlayersController@get']);
        Route::post('/save', ['as' => 'players.save', 'uses' => 'PlayersController@save']);
        Route::get('edit/{playerId}', ['as' => 'players.edit', 'uses' => 'PlayersController@edit']);
        Route::get('update/{playerId}', ['as' => 'players.update', 'uses' => 'PlayersController@update']);
        Route::get('delete/{playerId}', ['as' => 'players.delete', 'uses' => 'PlayersController@delete']);
    }
);

Route::group(
    [
        'middleware' => 'web',
        'prefix' => 'api/v1',
        'namespace' => 'Modules\Players\Http\Controllers'
    ], function() {
        Route::get('get/players', ['as' => 'get.players.getPlayers', 'uses' => 'PlayersController@getPlayers']);
    }
);
