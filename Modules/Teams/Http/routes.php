<?php
Route::group(
    [
        'middleware' => 'web',
        'prefix' => 'teams',
        'namespace' => 'Modules\Teams\Http\Controllers'
    ], function() {
        Route::get('create', ['as' => 'teams.create', 'uses' => 'TeamsController@create']);
        Route::get('', ['as' => 'teams.get', 'uses' => 'TeamsController@get']);
        Route::post('/save', ['as' => 'teams.save', 'uses' => 'TeamsController@save']);
        Route::get('edit/{teamId}', ['as' => 'teams.edit', 'uses' => 'TeamsController@edit']);
        Route::get('update/{teamId}', ['as' => 'teams.update', 'uses' => 'TeamsController@update']);
        Route::delete('delete/{teamId}', ['as' => 'teams.delete', 'uses' => 'TeamsController@delete']);
    }
);

Route::group(
    [
        'middleware' => 'web',
        'prefix' => 'api/v1',
        'namespace' => 'Modules\Teams\Http\Controllers'
    ], function() {
    Route::get('get/teams', ['as' => 'get.teams.getTeams', 'uses' => 'TeamsController@getTeams']);
}
);