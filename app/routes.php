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
Route::get('home/template/{code}','HomeController@template');

Route::group(array('before'=>'guest'),function(){
	Route::get('account/login','AccountController@getLogin');
	Route::post('account/login','AccountController@postLogin');
	Route::get('account/forget-password','AccountController@getForgetPassword');
	Route::post('account/forget-password','AccountController@postForgetPassword');
	
});
// Admin routes
Route::group(array('before'=>'admin','prefix'=>'admin'),function(){
	Route::get('empe/search','App\Controller\Admin\EmployeeController@search');
	Route::post('empe/client-by-branch','App\Controller\Admin\EmployeeController@clientByBranch');
	Route::controller('user','App\Controller\Admin\UserController');
	Route::resource('branch','App\Controller\Admin\BranchController');
	Route::resource('bank','App\Controller\Admin\BankController');
	Route::resource('dept','App\Controller\Admin\DepartmentController');
	Route::resource('empe','App\Controller\Admin\EmployeeController');
	Route::controller('/','App\Controller\Admin\IndexController');
});
// Branch Routes
Route::group(array('before'=>'branch','prefix'=>'branch'),function(){
	Route::get('employee/search','App\Controller\Branch\EmployeeController@search');
	Route::get('employee/import','App\Controller\Branch\EmployeeController@getImportEmp');
	Route::post('employee/import','App\Controller\Branch\EmployeeController@postImportEmp');
	Route::resource('client','App\Controller\Branch\ClientController');
	Route::resource('employee','App\Controller\Branch\EmployeeController');

	// Route::controller('/','App\Controller\Branch\IndexController');
});
// Client Routes
Route::group(array('before'=>'client','prefix'=>$profile),function(){

	Route::resource('emps','App\Controller\Client\EmployeeController');
	// Route::resource('/','App\Controller\Client\IndexController@index');
});
// Employee Routes
Route::group(array('before'=>'employee','prefix'=>$profile),function(){
	Route::resource('emp','App\Controller\Emp\IndexController');
});
// Authentication Routes
Route::group(array('before'=>'auth','prefix'=>$profile),function(){
	Route::resource('users','UsersController');

});

