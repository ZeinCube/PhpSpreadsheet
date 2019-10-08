<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\MathTrig;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\MathTrig;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerPRODUCT
     *
     * @param mixed $expectedResult
     */
    public function testPRODUCT($expectedResult, ...$args)
    {
        $result = MathTrig::PRODUCT(...$args);
        $this->assertEquals($expectedResult, $result, '', 1E-12);
    }

    public function providerPRODUCT()
    {
        return require 'data/Calculation/MathTrig/PRODUCT.php';
    }
}
