<?php
namespace App\Calculator\Battery;

use App\Calculator\BatteryAbstract;


class AABattery extends BatteryAbstract {
    protected float $battery = 100;
    protected float $dec = 25;
}
