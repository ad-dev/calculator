<?php

namespace App\Calculator;

interface BatteryInterface {
    public function useBattery();
    public function getState();
}
