<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'BaseController@getIndex');
Route::get('account/sign-out','AccountController@getSignOut');

Route::resource('users','UsersController');

Route::group(array('before'=>'guest'),function(){
	Route::get('account/login','AccountController@getLogin');
	Route::post('account/login','AccountController@postLogin');
});

Route::group(array('before'=>'admin','prefix'=>'admin'),function(){
	Route::get('/','App\Controller\Admin\IndexController@getIndex');
	Route::controller('user','App\Controller\Admin\UserController');
});
