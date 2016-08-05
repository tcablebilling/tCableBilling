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
Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index'] );
	Route::get('/print-m', ['as' => 'print-m', 'uses' => 'HomeController@billMonthly'] );
	Route::get('/print-custom', ['as' => 'print-custom', 'uses' => 'HomeController@clientCustom'] );

	Route::get('/individual', [ 'as' => 'individual', 'uses' => 'BillingsController@individualClient'] );

	Route::get('/db-backup', ['as' => 'db-backup', 'uses' => 'HomeController@dbBackup'] );

	Route::resource( '/users', 'UsersController' );
	Route::resource( '/clients', 'ClientsController' );
	Route::resource( '/packages', 'PackagesController' );
	Route::resource( '/areas', 'AreasController' );
	Route::resource( '/payments', 'PaymentsController');
	Route::resource( '/billings', 'BillingsController');
	Route::resource( '/employees', 'EmployeesController');
});
// Authentication routes...
Route::get( '/', 'HomeController@rootPath' );
Route::get( '/login', [ 'as' => 'getLogin', 'uses' => 'Auth\AuthController@getLogin' ] );
Route::post( '/login', [ 'as' => 'postLogin', 'uses' => 'Auth\AuthController@postLogin' ] );
Route::get( 'logout', 'Auth\AuthController@getLogout' );
