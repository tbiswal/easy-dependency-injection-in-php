<?php
namespace DockType;

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


class BillingService
{
    public function billable($rfbilling) {
        $email = 'tan.biswal@rapidfunnel.com';
        $rfbilling->subscribe($email);
    }
}

$billingService = new BillingService();
$billingService->billable(new Stripe());
