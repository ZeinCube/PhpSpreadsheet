<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Engineering;

use PhpOffice\UltimateSpreadSheet\Calculation\Engineering;
use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PHPUnit\Framework\TestCase;

class Oct2HexTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerOCT2HEX
     *
     * @param mixed $expectedResult
     */
    public function testOCT2HEX($expectedResult, ...$args)
    {
        $result = Engineering::OCTTOHEX(...$args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerOCT2HEX()
    {
        return require 'data/Calculation/Engineering/OCT2HEX.php';
    }
}
