<?php
namespace App\Calculator;

use Exception;

class Calculator {

    const MSG_DIV_BY_ZERO = "MSG_DIV_BY_ZERO";
    private BatteryPackInterface $battPack;

    function __construct(BatteryPackInterface $battPack) {
        $this->battPack = $battPack;
    }
    
    function multiply(float $a, float $b): float {
        $this->battPack->useBattery();
        return $a*$b;
    }


    function divide(float $a, float $b): float {       
        if ($b == 0) {
            throw new Exception(self::MSG_DIV_BY_ZERO);
        }
        $this->battPack->useBattery();
        return $a / $b;
        
    }
}
