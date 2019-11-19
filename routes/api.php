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
    Route::prefix('room')->group(function () {
        Route::get('/', 'Api\RoomApiController@getall');
        Route::get('price', 'Api\RoomApiController@getPrice');
        Route::put('update_price', 'Api\RoomApiController@update_price');
        Route::post('insert', 'Api\RoomApiController@insert');
        Route::put('update', 'Api\RoomApiController@update');
        Route::put('delete', 'Api\RoomApiController@delete');
        Route::get('detail', 'Api\RoomApiController@detail');
    });
    Route::prefix('renter')->group(function () {
        Route::get('/', 'Api\RenterApiController@getall');
        Route::post('insert', 'Api\RenterApiController@insert');
        Route::put('update', 'Api\RenterApiController@update');
        Route::put('delete', 'Api\RenterApiController@delete');
        Route::get('detail', 'Api\RenterApiController@detail');
    });
    Route::prefix('rent_room')->group(function () {
        Route::get('/', 'Api\RentRoomApiController@getall');
        Route::post('insert', 'Api\RentRoomApiController@rent_room');
        Route::get('leave', 'Api\RentRoomApiController@leave_room');
        Route::get('pay', 'Api\RentRoomApiController@pay_room');
        Route::get('history', 'Api\RentRoomApiController@watch_history');
    });
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

