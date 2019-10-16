<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('language/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});
Route::get('/', 'Auth\LoginController@login')->name('login');
Route::post('/','Auth\LoginController@authenticate')->name('aut');
Route::get('logout', 'Auth\LoginController@logout');
Route::post('forget', 'Auth\LoginController@forget_password')->name('forget');
Route::group(['prefix' => 'home'], function () {
    Route::get('/', 'HomeController@index');
    Route::post('updatePrice', 'HomeController@update_price');
    Route::get('add_room','HomeController@view_add');
    Route::post('insert_room','HomeController@insert_room')->name('Insert_Room');
    Route::get('view_update/{id}','HomeController@view_update');
    Route::post('updateRoom','HomeController@update_room')->name('Update_Room');
    Route::get('delete/{id}','HomeController@delete_room');
    Route::get('view_detail/{id}','HomeController@detail_room');

    Route::get('{any}', function () {
        return 'error';
    });
});
Route::group(['prefix' => 'renter'], function () {
    Route::get('/', 'ListRenterController@index');
    Route::get('add_renter','ListRenterController@view_add');
    Route::post('insert_renter','ListRenterController@insert_renter')->name('Insert_Renter');
    Route::get('view_update/{id}','ListRenterController@view_update');
    Route::post('update_renter','ListRenterController@update_renter')->name('Update_Renter');
    Route::get('delete/{id}','ListRenterController@delete_renter');
    Route::get('view_detail/{id}','ListRenterController@detail_renter');

    Route::get('{any}', function () {
        return 'error';
    });
});
Route::group(['prefix' => 'room_rent'], function () {
    Route::get('/{page?}', 'ListRenterRoomController@index')->name('Room_Rent');
    Route::get('view_add/{id}/{page}', 'ListRenterRoomController@view_add');
    Route::post('add_reterRoom', 'ListRenterRoomController@AddRenter');
    Route::post('leaver_room', 'ListRenterRoomController@leaver_room');
    Route::post('pay_all', 'ListRenterRoomController@payAll');
    Route::post('watch_history/', 'ListRenterRoomController@watch_history');
    Route::get('{any}', function () {
        return 'error';
    });
});
Route::get('maps', 'MapsController@index');
Route::get('{any}', function () {
    return 'error';
});


