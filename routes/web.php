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

Route::get('/', 'PublicController@home')->name('home');
Route::get('/event', 'PrivateController@view')->name('event.private.view');
Route::get('/invitation-form', 'PrivateController@invitationForm')->name('event.invitation');
Route::post('/invitation-response', 'PrivateController@respondToEvent')->name('event.response');

Route::namespace('Admin')->prefix('admin')->group(function () {
  Route::get('/', 'DashboardController@index')->name('root');
  Route::get('/create', 'IndexController@create')->name('admin.create');
  Route::get('/edit', 'IndexController@edit')->name('admin.edit');
  Route::get('/profile', 'IndexController@profile')->name('admin.profile');
  Route::get('/users', 'IndexController@list')->name('users.list');

  Route::get('/list/{table}', 'ListController@index')->name('list');

  Route::resource('/events', 'EventController');
});

Route::namespace('Account')->prefix('account')->group(function () {
  Route::get('/', 'DashboardController@index')->name('account.root');
  Route::get('/edit', 'IndexController@edit')->name('account.edit');
  Route::get('/profile', 'IndexController@profile')->name('account.profile');
});
