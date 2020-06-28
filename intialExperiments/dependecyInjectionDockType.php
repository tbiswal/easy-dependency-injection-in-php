<?php

class Stripe
{
	public function subscribe($email) {
		die('Stripe subscription added');
	}
}

class Authorize
{
	public function subscribe($email) {
		die('Authorize subscription added');
	}
}


class RFBillingController
{
	public function store($rfbilling) {
		$email = 'tan.biswal@rapidfunnel.com';
		$rfbilling->subscribe($email);
	}
}

$rfObject = new RFBillingController();

// $rfObject->store(new Stripe());
$rfObject->store(new Authorize());
