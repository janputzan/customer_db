<?php

class CustomerValidator extends BaseValidator {

	public function __construct($data) {

		$this->rules = array(

			'email' => 'required|email|unique:customers'
		);
		
		parent::__construct($data);
	}

}