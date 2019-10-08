<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\MathTrig;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\MathTrig;
use PHPUnit\Framework\TestCase;

class SumProductTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerSUMPRODUCT
     *
     * @param mixed $expectedResult
     */
    public function testSUMPRODUCT($expectedResult, ...$args)
    {
        $result = MathTrig::SUMPRODUCT(...$args);
        $this->assertEquals($expectedResult, $result, '', 1E-12);
    }

    public function providerSUMPRODUCT()
    {
        return require 'data/Calculation/MathTrig/SUMPRODUCT.php';
    }
}
