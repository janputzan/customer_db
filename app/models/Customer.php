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

	public function get_totals() {

		$totals = new stdClass;

		$totals->quantity = 0;
		$totals->amount = 0;
		$totals->postage = 0;

		foreach ($this->orders()->get() as $order) {

			$totals->quantity += $order->quantity;

			$totals->amount += $order->amount;

			$totals->postage += $order->postage;
		}

		return $totals;
	}
}
