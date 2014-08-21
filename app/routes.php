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
$profile='';
if(Auth::check())
{
	$profile=Auth::user()->profile->name;
}
Route::get('/', 'BaseController@getIndex');
Route::get('account/sign-out','AccountController@getSignOut');
Route::get('account/create-password','AccountController@getCreatePassword');
Route::post('account/create-password','AccountController@postCreatePassword');
Route::get('account/recover/{code}','AccountController@getRecover');

Route::group(array('before'=>'guest'),function(){
	Route::get('account/login','AccountController@getLogin');
	Route::post('account/login','AccountController@postLogin');
	Route::get('account/forget-password','AccountController@getForgetPassword');
	Route::post('account/forget-password','AccountController@postForgetPassword');
	
});
// Admin routes
Route::group(array('before'=>'admin','prefix'=>'admin'),function(){
	Route::get('/','App\Controller\Admin\IndexController@getIndex');
	Route::controller('user','App\Controller\Admin\UserController');
	Route::resource('branch','App\Controller\Admin\BranchController');
	Route::resource('bank','App\Controller\Admin\BankController');
});
// Branch Routes
Route::group(array('before'=>'branch','prefix'=>'branch'),function(){
	Route::get('/','App\Controller\Branch\IndexController@getIndex');
	Route::resource('client','App\Controller\Branch\ClientController');
});
// Client Routes
Route::group(array('before'=>'client','prefix'=>$profile),function(){
	Route::get('/','App\Controller\Client\IndexController@getIndex');
	Route::resource('emp','App\Controller\Client\EmployeeController');
});
// Authentication Routes
Route::group(array('before'=>'auth','prefix'=>$profile),function(){
	Route::resource('users','UsersController');
});

