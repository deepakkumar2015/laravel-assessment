<?php

Route::group(
    [
        'middleware' => 'web',
        'prefix' => 'players',
        'namespace' => 'Modules\Players\Http\Controllers'
    ], function() {
        Route::get('/', 'PlayersController@getPlayers');
    }
);
