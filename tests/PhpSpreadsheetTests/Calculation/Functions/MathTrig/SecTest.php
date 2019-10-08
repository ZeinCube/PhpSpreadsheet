<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\MathTrig;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\MathTrig;
use PHPUnit\Framework\TestCase;

class SecTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerSEC
     *
     * @param mixed $expectedResult
     * @param mixed $angle
     */
    public function testSEC($expectedResult, $angle)
    {
        $result = MathTrig::SEC($angle);
        $this->assertEquals($expectedResult, $result, '', 1E-12);
    }

    public function providerSEC()
    {
        return require 'data/Calculation/MathTrig/SEC.php';
    }
}
