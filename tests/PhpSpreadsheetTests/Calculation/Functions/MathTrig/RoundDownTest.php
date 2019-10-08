<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\MathTrig;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\MathTrig;
use PHPUnit\Framework\TestCase;

class RoundDownTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerROUNDDOWN
     *
     * @param mixed $expectedResult
     */
    public function testROUNDDOWN($expectedResult, ...$args)
    {
        $result = MathTrig::ROUNDDOWN(...$args);
        $this->assertEquals($expectedResult, $result, '', 1E-12);
    }

    public function providerROUNDDOWN()
    {
        return require 'data/Calculation/MathTrig/ROUNDDOWN.php';
    }
}
