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

Route::post('login', 'Api\AuthController@login');
//Route::post('logout', 'Api\AuthController@logout');
//jwt.verify,jwt.auth
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'Api\AuthController@getAuthenticatedUser');
    Route::post('logout', 'Api\AuthController@logout');
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

