<?php

namespace TorchLight_1;

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
            print("Flash light is on.\n");
        } else {
            print('Flash light is off as no charge left.');
        }
    }

    public function off()
    {
        print('Flash Light is off.');
    }
}


$flashLightObj = new TorchLight(10);
$flashLightObj->on();
$flashLightObj->off();
exit;
