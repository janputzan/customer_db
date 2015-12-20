<?php

class OrderValidator extends BaseValidator {

	public function __construct($data) {

		$this->rules = array(

			'quantity' 	=> 'required|integer|min:1',
			'amount' 	=> 'required|numeric|min:0',
			'postage' 	=> 'required|numeric|min:0' 
		);
		
		parent::__construct($data);
	}
}