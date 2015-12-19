<?php


class Customer extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'customers';

	
	public function orders() {

		return $this->hasMany('Order');
	}
}
