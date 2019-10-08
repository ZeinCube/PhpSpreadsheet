<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\MathTrig;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\MathTrig;
use PHPUnit\Framework\TestCase;

class CombinTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerCOMBIN
     *
     * @param mixed $expectedResult
     */
    public function testCOMBIN($expectedResult, ...$args)
    {
        $result = MathTrig::COMBIN(...$args);
        $this->assertEquals($expectedResult, $result, '', 1E-12);
    }

    public function providerCOMBIN()
    {
        return require 'data/Calculation/MathTrig/COMBIN.php';
    }
}
