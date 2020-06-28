<?php

interface Billing
{
	public function subscribe($email);
}


class Stripe implements Billing
{
	public function subscribe($email) {
		die('Stripe subscription added');
	}
}

class Authorize implements Billing
{
	public function subscribe($email) {
		die('Authorize subscription added');
	}
}


class RFBillingController
{
	public function store(Billing $rfbilling) {
		$email = 'tan.biswal@rapidfunnel.com';
		$rfbilling->subscribe($email);
	}
}

$rfObject = new RFBillingController();

// $rfObject->store(new Stripe());
$rfObject->store(new Authorize());
