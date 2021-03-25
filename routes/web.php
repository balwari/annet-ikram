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

Route::get('/', 'App\Http\Controllers\UserController@index');
Route::get('/user-dashboard', 'App\Http\Controllers\UserController@get')->name('allshows');
Route::get('/get-details-show/{id}', 'App\Http\Controllers\UserController@getShow')->name('get-details-show');
Route::get('/book/{id}', 'App\Http\Controllers\UserController@book')->name('book');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('all');

    Route::get('/bookings', 'App\Http\Controllers\AdminController@getBookings')->name('bookings');

    Route::get('/theatre-home', 'App\Http\Controllers\TheatreController@index')->name('theatre-home');
    Route::post('/theatre-create', 'App\Http\Controllers\TheatreController@create')->name('theatre-create');
    Route::get('/get-theatre/{id}', 'App\Http\Controllers\TheatreController@getTheatre')->name('theatre-get');
    Route::get('/theatre-update/{id}', 'App\Http\Controllers\TheatreController@update')->name('theatre-update');
    Route::get('/theatre-delete/{id}', 'App\Http\Controllers\TheatreController@delete')->name('theatre-delete');

    Route::get('/movie-home', 'App\Http\Controllers\MovieController@index')->name('movie-home');
    Route::post('/movie-create', 'App\Http\Controllers\MovieController@create')->name('movie-create');
    Route::get('/get-movie/{id}', 'App\Http\Controllers\MovieController@getMovie')->name('movie-get');
    Route::get('/movie-update/{id}', 'App\Http\Controllers\MovieController@update')->name('movie-update');
    Route::get('/movie-delete/{id}', 'App\Http\Controllers\MovieController@delete')->name('movie-delete');

    Route::get('/showtime-home', 'App\Http\Controllers\ShowtimeController@index')->name('showtime-home');
    Route::post('/showtime-create', 'App\Http\Controllers\ShowtimeController@create')->name('showtime-create');
    Route::get('/get-showtime/{id}', 'App\Http\Controllers\ShowtimeController@getShowtime')->name('showtime-get');
    Route::get('/showtime-update/{id}', 'App\Http\Controllers\ShowtimeController@update')->name('showtime-update');
    Route::get('/showtime-delete/{id}', 'App\Http\Controllers\ShowtimeController@delete')->name('showtime-delete');

    Route::get('/show-home', 'App\Http\Controllers\ShowController@index')->name('show-home');
    Route::post('/show-get-theatre', 'App\Http\Controllers\ShowController@showGetTheatre')->name('show-get-theatre');
    Route::post('/show-create', 'App\Http\Controllers\ShowController@create')->name('show-create');
    Route::get('/get-show/{id}', 'App\Http\Controllers\ShowController@getShow')->name('show-get');
    Route::get('/show-update/{id}', 'App\Http\Controllers\ShowController@update')->name('show-update');
    Route::get('/show-delete/{id}', 'App\Http\Controllers\ShowController@delete')->name('show-delete');

});

