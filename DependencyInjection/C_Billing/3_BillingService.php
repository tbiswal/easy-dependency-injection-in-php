<?php
namespace Billing_3;

class Stripe
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
class PayPal
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
    
    public function __construct() {
        // $this->paymentAPI = new Stripe();
        $this->paymentAPI = new PayPal();
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

$billingService = new BillingService();
$billingService->billable();
$billingService->cancelBill();