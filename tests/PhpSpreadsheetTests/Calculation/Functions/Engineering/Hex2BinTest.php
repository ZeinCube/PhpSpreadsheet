<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Engineering;

use PhpOffice\UltimateSpreadSheet\Calculation\Engineering;
use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PHPUnit\Framework\TestCase;

class Hex2BinTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerHEX2BIN
     *
     * @param mixed $expectedResult
     */
    public function testHEX2BIN($expectedResult, ...$args)
    {
        $result = Engineering::HEXTOBIN(...$args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerHEX2BIN()
    {
        return require 'data/Calculation/Engineering/HEX2BIN.php';
    }
}
