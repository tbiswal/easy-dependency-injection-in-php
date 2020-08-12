<?php

namespace TorchLight_1;

class TorchLight
{
    private $battery;
    private $hoursUsed;

    public function __construct($hoursUsed)
    {
        $this->hoursUsed = $hoursUsed;
        $this->battery = new Duracell();
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

class Duracell
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

$flashLightObj = new TorchLight(10);
$flashLightObj->on();
$flashLightObj->off();
