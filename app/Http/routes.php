<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('member', 'MembersController@index');
Route::any('createmember', 'MembersController@create');
Route::get('deletemember', 'MembersController@delete');
Route::get('updatemember', 'MembersController@update');
Route::post('updatemember', 'MembersController@updatemember');



Route::get('home', 'AdminController@index');
// This will authenticate Admin user and on success it will return route to Home, so we have a home route above
Route::controllers([
 'auth' => 'Auth\AuthController',
 'password' => 'Auth\PasswordController',
]);
