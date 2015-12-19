<?php

class AuthController extends BaseController {

	public function showLogin()
	{
		return View::make('login')->with('page_title', 'Login');
	}

	public function attempt() {

		$email = Input::get('email');

		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password))) {

		    $this->alert('You have been logged in', 'success');

		    return Redirect::intended('/');
		
		} else {

			$this->alert('Wrong credentials', 'danger');

			return Redirect::back();
		}
	}

	public function logout() {

		Auth::logout();

		$this->alert('You have been logged out', 'info');

		return Redirect::to('/login');
	}

}
