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
    /**
    * @var Billing
    */
    protected $billing;

    public function __construct(Billing $billing) {

        $this->billing = $billing;
    }

    public function billable() {
        $email = 'tan.biswal@rapidfunnel.com';
        $this->billing->subscribe($email);
    }
}

$billingObject = new BillingController(new Authorize());

$billingObject->billable();
