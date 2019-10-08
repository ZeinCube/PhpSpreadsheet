<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\MathTrig;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\MathTrig;
use PHPUnit\Framework\TestCase;

class SechTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerSECH
     *
     * @param mixed $expectedResult
     * @param mixed $angle
     */
    public function testSECH($expectedResult, $angle)
    {
        $result = MathTrig::SECH($angle);
        $this->assertEquals($expectedResult, $result, '', 1E-12);
    }

    public function providerSECH()
    {
        return require 'data/Calculation/MathTrig/SECH.php';
    }
}
