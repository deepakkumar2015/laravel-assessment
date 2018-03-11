<?php

Route::group(
    [
        'middleware' => 'web',
        'prefix' => 'teams',
        'namespace' => 'Modules\Teams\Http\Controllers'
    ], function() {
    Route::get('/', 'TeamsController@getTeams');
});
