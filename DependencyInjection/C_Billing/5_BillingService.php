<?php
namespace Billing_5;

interface PaymentAPI
{
    public function subscribe();
    public function cancelSubscription();
}


class Stripe implements PaymentAPI
{
    public function subscribe()
    {
        print("Stripe subscription added \n");
    }

    public function cancelSubscription()
    {
        print("Stripe subscription cancelled \n");
    }
}


// New requirements to use PayPal
class PayPal implements PaymentAPI
{
    public function subscribe()
    {
        print("Paypal subscription added \n");
    }

    public function cancelSubscription()
    {
        print("Paypal subscription cancelled \n");
    }
}


class BillingService
{
    private $paymentAPI;
    
    // DI Interface Type
    public function __construct(PaymentAPI $paymentAPI) {
        $this->paymentAPI = $paymentAPI;
    }

    public function billable()
    {
        $this->paymentAPI->subscribe();

        // $email = 'tan.biswal@rapidfunnel.com';
        // Notify in email
    }

    public function cancelBill()
    {
        $this->paymentAPI->cancelSubscription();

        // $email = 'tan.biswal@rapidfunnel.com';
        // Notify in email
    }
}

// $billingService = new BillingService(new Stripe());
$billingService = new BillingService(new Paypal());
$billingService->billable();
$billingService->cancelBill();