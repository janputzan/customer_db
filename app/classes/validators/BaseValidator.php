<?php

abstract class BaseValidator {

	protected $rules;

	protected $validator;

	protected $errors = [];

	public function __construct($data) {

		$this->validator = Validator::make($data, $this->rules);
	}

	public function hasErrors() {

		if ($this->validator->fails()) {

			foreach ($this->rules as $key => $value) {

				$this->errors[$key] = $this->validator->messages()->first($key);

			}

			return true;
		}

		return false;
	}

	public function getErrors() {

		if (!$this->hasErrors()) return array();

		return $this->errors;
	}
}