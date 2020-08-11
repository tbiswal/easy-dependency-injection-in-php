<?php

// Dependency Injection is a software design concept that allows a service to be used/injected in a way that is completely independent of any client consumption. This prevents the client from modifying when the underlying service changes.

// Dependency injection separates the creation of a client’s dependencies from the client’s behavior, which allows program designs to be loosely coupled.


interface Battery {
    public function drawPower($hoursUsed);
}


class TorchLight 
{
    private $battery;
    private $hoursUsed;

    public function __construct($hoursUsed, Battery $battery) {
        $this->hoursUsed = $hoursUsed;
        $this->battery = $battery;
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


class Duracell implements Battery
{
    private $chargeInPercentage;
    private $batteryLife;
    private $hoursUsed;

    public function __construct() {
        $this->chargeInPercentage = 0;
        $this->batteryLife = 100; // hours
    }

    public function drawPower($hoursUsed) {
        $this->hoursUsed = $hoursUsed;
        if ($this->hoursUsed > $this->batteryLife) {
            $this->hoursUsed = $this->batteryLife;
        }

        return $this->chargeInPercentage = (($this->batteryLife - $this->hoursUsed) / $this->batteryLife) * 100;
    }
}

$flashLightObj = new TorchLight(10, new Duracell());
$flashLightObj->on();
$flashLightObj->off();

