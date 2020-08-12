<?php

// Dependency Injection is a software design concept that allows a service to be used/injected in a way that is completely independent of any client consumption. This prevents the client from modifying when the underlying service changes.

// Dependency injection separates the creation of a client’s dependencies from the client’s behavior, which allows program designs to be loosely coupled.

namespace TorchLight_2;

interface Battery
{
    public function chargeLeft($hoursUsed);
}


class TorchLight
{
    private $battery;
    private $hoursUsed;

    public function __construct($hoursUsed, Battery $battery)
    {
        $this->hoursUsed = $hoursUsed;
        $this->battery = $battery;
    }

    public function on()
    {
        if ($this->battery->chargeLeft($this->hoursUsed) >= 1) {
            die('Flash Light On');
        } else {
            die('Flash light is off as no charge left.');
        }
    }

    public function off()
    {
        die('Flash Light Off');
    }
}


class Duracell implements Battery
{
    private $batteryLife;

    public function __construct()
    {
        $this->batteryLife = 100; // hours
    }

    public function chargeLeft($hoursUsed)
    {
        if ($hoursUsed > $this->batteryLife) {
            $hoursUsed = $this->batteryLife;
        }

        return (($this->batteryLife - $hoursUsed) / $this->batteryLife) * 100;
    }
}

$flashLightObj = new TorchLight(10, new Duracell());
$flashLightObj->on();
$flashLightObj->off();
