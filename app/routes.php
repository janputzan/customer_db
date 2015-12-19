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

Route::get('/login', array('as' => 'login', 'uses' => 'AuthController@showLogin'));

Route::post('/login', array('as' => 'attempt', 'uses' => 'AuthController@attempt'));

Route::group(array('before' => 'auth'), function() {

	Route::get('/', array('as' => 'dashboard', 'uses' => 'HomeController@showDashboard'));


	Route::get('/logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));

	Route::group(array('prefix' => 'customer'), function() {

		Route::post('/find', array('as' => 'customer.find', 'uses' => 'CustomerController@find'));
		
		Route::get('/add', array('as' => 'customer.add_new', 'uses' => 'CustomerController@add'));

		Route::post('/add', array('as' => 'customer.store', 'uses' => 'CustomerController@store'));

		Route::get('/show/{id}', array('as' => 'customer.show', 'uses' => 'CustomerController@show'));

		Route::post('/add_order{id}', array('as' => 'customer.store_order', 'uses' => 'CustomerController@store_order'));
	});

	Route::group(array('prefix' => 'report'), function() {

		Route::get('/', array('as' => 'reports.index', 'uses' => 'ReportController@index'));
	});
});
