<?php
namespace App\Calculator;

use Exception;
use App\Calculator\BatteryInterface;

abstract class BatteryAbstract implements BatteryInterface {

    const MSG_NO_POWER = "no power left!";

    protected float $battery; // battery power percentage
    protected float $dec; // signle use of battery decreses power by this percentage

    public function useBattery() {

        if ($this->battery < 1) {
            throw new Exception(self::MSG_NO_POWER);
        }
        $this->battery -= $this->dec;
        print get_class($this);
        print " ";
        print $this->battery;
        print "%\n";
    }

    public function getState(): float {
        return $this->battery === null ? 0 : $this->battery;
    }
}