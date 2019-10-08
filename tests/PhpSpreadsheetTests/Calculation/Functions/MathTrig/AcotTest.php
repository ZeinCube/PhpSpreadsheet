<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\MathTrig;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\MathTrig;
use PHPUnit\Framework\TestCase;

class AcotTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerACOT
     *
     * @param mixed $expectedResult
     * @param mixed $number
     */
    public function testACOT($expectedResult, $number)
    {
        $result = MathTrig::ACOT($number);
        $this->assertEquals($expectedResult, $result, '', 1E-12);
    }

    public function providerACOT()
    {
        return require 'data/Calculation/MathTrig/ACOT.php';
    }
}
