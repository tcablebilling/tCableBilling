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
Route::get( '/login', [ 'as' => 'getLogin', 'uses' => 'LoginController@showLoginForm' ] );
Route::post( '/login', [ 'as' => 'postLogin', 'uses' => 'LoginController@login' ] );
Route::get( 'logout', 'LoginController@logout' );
