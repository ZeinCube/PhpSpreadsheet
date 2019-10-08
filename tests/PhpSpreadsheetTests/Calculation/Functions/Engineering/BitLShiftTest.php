<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Engineering;

use PhpOffice\UltimateSpreadSheet\Calculation\Engineering;
use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PHPUnit\Framework\TestCase;

class BitLShiftTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerBITLSHIFT
     *
     * @param mixed $expectedResult
     * @param mixed[] $args
     */
    public function testBITLSHIFT($expectedResult, array $args)
    {
        $result = Engineering::BITLSHIFT(...$args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerBITLSHIFT()
    {
        return require 'data/Calculation/Engineering/BITLSHIFT.php';
    }
}
