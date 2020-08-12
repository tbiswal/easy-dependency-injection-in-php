<?php
namespace Billing_2;

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


class BillingService
{
    private $paymentAPI;
    
    public function __construct() {
        $this->paymentAPI = new Stripe();
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
