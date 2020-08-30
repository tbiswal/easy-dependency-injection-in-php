<?php
require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Container\Container;

interface PaymentAPI
{
    public function subscribe($email);
}

class Stripe implements PaymentAPI
{
    public function subscribe($email)
    {
        print("Stripe subscription added \n");
    }
}

class Authorize implements PaymentAPI
{
    public function subscribe($email)
    {
        print("Authorize subscription added \n");
    }
}


// Need Stripe
class BillingService
{
    /**
     * @var PaymentAPI
     */
    protected $paymentAPI;

    public function __construct(PaymentAPI $paymentAPI)
    {
        $this->paymentAPI = $paymentAPI;
    }

    public function billable()
    {
        $email = 'tan.biswal@rapidfunnel.com';
        $this->paymentAPI->subscribe($email);
    }
}

// Need Authorize
class OtherBillingService
{
    /**
     * @var PaymentAPI
     */
    protected $paymentAPI;

    public function __construct(PaymentAPI $paymentAPI)
    {
        $this->paymentAPI = $paymentAPI;
    }

    public function billable()
    {
        $email = 'tan.biswal@rapidfunnel.com';
        $this->paymentAPI->subscribe($email);
    }
}

// $billingService = new BillingService(new Stripe());
// $billingService->billable();

// $otherBillingService = new OtherBillingService(new Authorize());
// $otherBillingService->billable();

$app = new Container();

$app->when(BillingService::class)
    ->needs(PaymentAPI::class)
    ->give(function () {
        return new Stripe();
    });

$app->when(OtherBillingService::class)
    ->needs(PaymentAPI::class)
    ->give(function () {
        return new Authorize();
    });

$billingService = $app->make('BillingService');
$billingService->billable();

$otherBillingService = $app->make('OtherBillingService');
$otherBillingService->billable();