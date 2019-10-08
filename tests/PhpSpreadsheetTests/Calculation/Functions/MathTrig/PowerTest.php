<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\MathTrig;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\MathTrig;
use PHPUnit\Framework\TestCase;

class PowerTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerPOWER
     *
     * @param mixed $expectedResult
     */
    public function testPOWER($expectedResult, ...$args)
    {
        $result = MathTrig::POWER(...$args);
        $this->assertEquals($expectedResult, $result, '', 1E-12);
    }

    public function providerPOWER()
    {
        return require 'data/Calculation/MathTrig/POWER.php';
    }
}
