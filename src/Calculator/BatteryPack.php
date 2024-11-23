<?php
namespace App\Calculator;

use Exception;
use Throwable;

class BatteryPack implements BatteryPackInterface {

    const MSG_ALL_BATTERIES_ARE_EMPTY = "all batteries are empty";

    private array $batteries = [];

    public function addBattery(BatteryInterface $battery) {
     $this->batteries[] = $battery;
    }

    public function useBattery() {
        
        if (count($this->batteries) == 0) {
            throw new Exception(self::MSG_ALL_BATTERIES_ARE_EMPTY);

        }
        
        $batt = end($this->batteries);
        try {
            $batt->useBattery();
        } catch (Throwable $e) {
            array_pop($this->batteries);
        }
    }

    public function getState(): float {
        if (count($this->batteries) == 0) {
            return 0;
        }
        $sum = array_reduce($this->batteries, function ($carry, $item) {
            $carry += $item->getState();
            return $carry;

        },0);
        return $sum / count($this->batteries);
    }
    
}