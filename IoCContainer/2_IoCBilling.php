<?php
require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Container\Container;

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

// class Authorize implements PaymentAPI
// {
// 	public function subscribe($email) {
// 		die('Authorize subscription added');
// 	}
// }


class BillingService
{
    /**
    * @var PaymentAPI
    */
    protected $paymentAPI;

    public function __construct(PaymentAPI $paymentAPI) {

        $this->paymentAPI = $paymentAPI;
    }

    public function billable() {
        $email = 'tan.biswal@rapidfunnel.com';
        $this->paymentAPI->subscribe($email);
    }
}

// $billingService = new BillingService(new Stripe());
// $billingService->billable();

// $billingService = new BillingService(new Authorize());
// $billingService->billable();

$app = new Container();

// Bind Interface With Implementation
$app->bind('PaymentAPI', 'Stripe');

$billingService = $app->make('BillingService');
$billingService->billable();