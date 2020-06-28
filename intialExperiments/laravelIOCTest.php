<?php

require __DIR__ . '/../vendor/autoload.php';
use Illuminate\Container\Container;


interface Gateway
{
	public function subscribe($email);
}


class Stripe implements Gateway
{
	public function subscribe($email) {
		die('Stripe subscription added');
	}
}

class Authorize implements Gateway
{
	public function subscribe($email) {
		die('Authorize subscription added');
	}
}


class RFBillingController
{


  /**
	* @var Gateway
	*/
	protected $gateway;

	public function __construct(Gateway $gateway) {

		$this->gateway = $gateway;
	}

	public function store() {
		$email = 'tan.biswal@rapidfunnel.com';
		$this->gateway->subscribe($email);
	}
}

$app = new Container();
// print_r($app->make('RFBillingController'));

// // It works
$app->bind('billing', function() {
	return new RFBillingController(new Authorize());
});

// $app->bind('App\Http\IoC\Gateway', 'App\Http\IoC\RFBillingController');
// var_dump($containr); exit;

// Dependency injection gets handled by IoC
// $rfObject =$app->make(RFBillingController::class);

$rfObject =$app->make('billing');
$rfObject->store();
