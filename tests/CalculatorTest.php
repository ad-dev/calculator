<?php

namespace App\Tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

use App\Calculator\Calculator;
use App\Calculator\BatteryPack;

use App\Calculator\Battery\AABattery;
use App\Calculator\Battery\AAABattery;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CalculatorTest extends KernelTestCase
{
    public function testCalculator() {

        $battPack = new BatteryPack();

        $battPack->addBattery(new AABattery());
        $battPack->addBattery(new AAABattery());

        $c = new Calculator($battPack);

        print("\n");
        print("Battery pack state check -> ");
        print($battPack->getState());
        print("%\n");

        $this->assertEquals(100, $battPack->getState());

        print($c->multiply(2,3));

        $this->assertEquals(75, $battPack->getState());

        print("\n");
        print($c->multiply(2,3));
        print("\n");
        print($c->multiply(2,1));

        print("\n");
        print($c->divide(2,7));
        print("\n");
        print($c->divide(2,2));
        print("\n");
        print($c->divide(2,8));
        print("\n");

        $this->assertEquals(25, $battPack->getState());

        print($c->divide(2,4));
        print("\n");
        print($c->divide(2,2));

        print("\n");
        print("Battery pack state check -> ");
        print($battPack->getState());
        print("%\n");

        $this->assertEquals(0, $battPack->getState());

        $this->expectException( \Exception::class);
        print($c->divide(2,80));
        print("\n");
        print($c->divide(2,40));
        print("\n");
        print($c->divide(2,20));

    }
}
