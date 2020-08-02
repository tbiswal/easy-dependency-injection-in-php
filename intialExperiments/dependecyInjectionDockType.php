<?php

class Stripe
{
	public function subscribe($email) {
		die('Stripe subscription added.');
	}
}

class Authorize
{
	public function subscribe($email) {
		die('Authorize subscription added.');
	}
}


class BillingController
{
	public function billable($rfbilling) {
		$email = 'tan.biswal@rapidfunnel.com';
		$rfbilling->subscribe($email);
	}
}

$rfObject = new BillingController();
$rfObject->billable(new Stripe());
