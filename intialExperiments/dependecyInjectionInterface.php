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


class BillingController
{
	public function billable(Billing $rfbilling) {
		$email = 'tan.biswal@rapidfunnel.com';
		$rfbilling->subscribe($email);
	}
}

$rfObject = new BillingController();

// $rfObject->store(new Stripe());
$rfObject->billable(new Authorize());
