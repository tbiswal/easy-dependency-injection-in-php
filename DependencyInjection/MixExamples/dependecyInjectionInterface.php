<?php
namespace InjectInterface;

interface PaymentAPI
{
    public function subscribe($email);
}

class Stripe implements PaymentAPI
{
    public function subscribe($email) {
        die('Stripe subscription added');
    }
}

class Authorize implements PaymentAPI
{
	public function subscribe($email) {
		die('Authorize subscription added');
	}
}

class BillingService
{
    public function billable(PaymentAPI $paymentAPI) {
        $email = 'tan.biswal@rapidfunnel.com';
        $paymentAPI->subscribe($email);
    }
}

$billingService = new BillingService();

$billingService->billable(new Stripe());
// $billingService->billable(new Authorize());
