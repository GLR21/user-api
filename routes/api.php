<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function() {

    Route::get('users', 'UserApiController@index');
    Route::get('users/{id}', 'UserApiController@show');
    Route::post('users/register', 'UserApiController@store');
});
?>
