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
Route::get('home', 'HomeController@index');
