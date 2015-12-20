<?php

use Customer;

class CustomerController extends BaseController {

	public function find() {

		$email = Input::get('email');


		$customer = Customer::where('email', $email)->first();

		if (!$customer) {

			$this->alert('Customer not found. Please create one.', 'info');

			return Redirect::route('customer.add_new');
		}

		return Redirect::route('customer.show', array('id' => $customer->id));

	}

	public function add() {

		return View::make('customers.add')->with('page_title', 'Add Customer');
	}

	public function store() {

		$email = Input::get('email');

		if ($existing_customer = Customer::where('email', $email)->first()) {

			$this->alert('Customer already exists.', 'info');

			return Redirect::route('customer.show', array('id' => $existing_customer->id));
		}

		$quantity = Input::get('quantity');

		$amount = Input::get('amount');

		$postage = Input::get('postage');

		$customer_val = new CustomerValidator(array('email' => $email));

		$order_val = new OrderValidator(array('quantity' => $quantity, 'amount' => $amount, 'postage' => $postage));

		$errors = array_merge($customer_val->getErrors(), $order_val->getErrors());

		if (empty($errors)) {

			$customer = new Customer;

			$customer->email = $email;

			$customer->save();

			$order = new Order;

			$order->quantity = $quantity;

			$order->amount = $amount;

			$order->postage = $postage;

			$customer->orders()->save($order);

			$this->alert('New customer has been added.', 'success');

			return Redirect::route('customer.show', array('id' => $customer->id));
			
		} else {

			$this->alert('Please correct the validation errors.', 'danger');

			return Redirect::back()->with('errors', $errors)->withInput();
		}

	}

	public function store_order($id) {

		$customer = Customer::find($id);

		if (!$customer) {

			$this->alert('Customer does not exist.', 'danger');

			return Redirect::back();
		}

		$quantity = Input::get('quantity');

		$amount = Input::get('amount');

		$postage = Input::get('postage');

		$order_val = new OrderValidator(array('quantity' => $quantity, 'amount' => $amount, 'postage' => $postage));

		$errors = $order_val->getErrors();

		if (empty($errors)) {

			$order = new Order;

			$order->quantity = $quantity;

			$order->amount = $amount;

			$order->postage = $postage;

			$customer->orders()->save($order);

			$this->alert('New order has been added.', 'success');

			return Redirect::route('customer.show', array('id' => $id));
			
		} else {

			$this->alert('Please correct the validation errors.', 'danger');

			return Redirect::back()->with('errors', $errors)->withInput();
		}
	}

	public function show($id) {

		$customer = Customer::find($id);

		if ($customer) {

			return View::make('customers.show')->with('customer', $customer)->with('page_title', 'Customer Orders');
		}

		$this->alert('Customer does not exist.', 'danger');

		return Redirect::route('dashboard');
	}

}
