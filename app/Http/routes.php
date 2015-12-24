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

Route::group(['middleware' => 'role'], function() {
	// Home URL [Must Be Logged In]
	Route::get( '/home', 'UsersController@index' );

	Route::get( '/dashboard', function () {
		$data = array(
			'name' => 'Shobuj',
			'id'   => '5'
		);

		return view( 'dashboard' )->with( 'data', $data );
	} );
});


Route::get('/', function () {
    return view('welcome');
});

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::group(['middleware' => 'auth'], function() {
	// Registration routes...
	Route::get('register', 'Auth\AuthController@getRegister');
	Route::post('register', 'Auth\AuthController@postRegister');
});
