<?php

interface Gateway
{
	public function subscribe($email);
}


class Stripe implements Gateway
{
	public function subscribe($email) {
		die('Stripe subscription added');
	}
}

class Authorize implements Gateway
{
	public function subscribe($email) {
		die('Authorize subscription added');
	}
}


class RFBillingController
{


  /**
	* @var Gateway
	*/
	protected $gateway;

	public function __construct(Gateway $gateway) {

		$this->gateway = $gateway;
	}

	public function store() {
		$email = 'tan.biswal@rapidfunnel.com';
		$this->gateway->subscribe($email);
	}
}

$rfObject = new RFBillingController(new Stripe());


// $rfObject->store(new Stripe());
$rfObject->store();
