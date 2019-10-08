<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\MathTrig;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\MathTrig;
use PHPUnit\Framework\TestCase;

class SignTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerSIGN
     *
     * @param mixed $expectedResult
     * @param $value
     */
    public function testSIGN($expectedResult, $value)
    {
        $result = MathTrig::SIGN($value);
        $this->assertEquals($expectedResult, $result, '', 1E-12);
    }

    public function providerSIGN()
    {
        return require 'data/Calculation/MathTrig/SIGN.php';
    }
}
