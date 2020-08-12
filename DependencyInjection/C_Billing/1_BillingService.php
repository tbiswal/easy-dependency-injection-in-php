<?php

namespace Billing_1;

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
    public function billable()
    {
        $paymentAPI = new Stripe();
        $paymentAPI->subscribe();

        // $email = 'tan.biswal@rapidfunnel.com';
        // Notify in email
    }

    public function cancelBill()
    {
        $paymentAPI = new Stripe();
        $paymentAPI->cancelSubscription();

        // $email = 'tan.biswal@rapidfunnel.com';
        // Notify in email
    }
}

$billingService = new BillingService();
$billingService->billable();
$billingService->cancelBill();
