<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

/*
Route::get('speakers', function () {
    return 'Moo';
});
*/

Route::get('speakers', 'SpeakersController@index')->middleware('auth:api', 'event');
Route::post('speakers', 'SpeakersController@store')->middleware('auth:api', 'event');

//Route::get('api/speakers', ['uses' => 'SpeakersController@index'])->middleware('auth:api');

	
//Route::get('/speakers', 'SpeakersController@index');

/*Route::get('api/speakers', function (App\Speakers) {
    return $speakers;
});*/

//Route::get('api/speakers', 'SpeakersController@index')->middleware('auth:api');