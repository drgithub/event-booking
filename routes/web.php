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

// Route::get('/', 'Home')->name('home');
// Route::get('login', 'Login')->name('login');
// Route::get('register', 'Register')->name('register');

Route::namespace('Admin')->prefix('admin')->group(function () {
  Route::get('/', 'DashboardController@index')->name('root');
  Route::get('/list/{table}', 'ListController@index')->name('list');

  Route::resource('/events', 'EventController');
});

Route::group(['prefix' => 'event', 'namespace' => 'Admin'], function() {
  Route::get('/guest/{id}', 'EventController@show');
  Route::get('/details/{id}', 'EventController@getEventDetails');
  Route::post('/acceptInvitation', 'EventController@acceptInvitation');
});
