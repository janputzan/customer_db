<?php

class ReportController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{

		$orders = Order::all();

		$customers = Customer::all();

		return View::make('reports.index')->with('page_title', 'Reports')->with('orders', $orders)->with('customers', $customers);
	}

}
