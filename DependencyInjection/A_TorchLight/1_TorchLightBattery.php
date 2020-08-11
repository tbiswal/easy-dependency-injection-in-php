<?php

// Dependency Injection is a software design concept that allows a service to be used/injected in a way that is completely independent of any client consumption. This prevents the client from modifying when the underlying service changes.

// Dependency injection separates the creation of a client’s dependencies from the client’s behavior, which allows program designs to be loosely coupled.

class TorchLight 
{
    private $battery;
    private $hoursUsed;

    public function __construct($hoursUsed) {
        $this->hoursUsed = $hoursUsed;
        $this->battery = new Duracell();
    }

    public function on() {
        if ($this->battery->drawPower($this->hoursUsed) >= 1) {
            die('Flash Light On');
        } else {
            die('Flash light is off as no charge left.');
        }
    }

    public function off() {
        die('Flash Light Off');
    }
}

class Duracell 
{
    private $chargeInPercentage;
    private $batteryLife;
    private $hoursUsed;

    public function __construct() {
        $this->chargeInPercentage = 0;
        $this->batteryLife = 100; // hours
    }

    public function drawPower($hoursUsed) {
        if ($hoursUsed > $this->batteryLife) {
            $hoursUsed = $this->batteryLife;
        }

        return $this->chargeInPercentage = (($this->batteryLife - $hoursUsed) / $this->batteryLife) * 100;
    }
}

$flashLightObj = new TorchLight(10);
$flashLightObj->on();
$flashLightObj->off();