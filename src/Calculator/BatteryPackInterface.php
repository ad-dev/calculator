<?php
namespace App\Calculator;

interface BatteryPackInterface {

    public function addBattery(BatteryInterface $battery);

    public function useBattery();

    public function getState();
}