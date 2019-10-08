<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Engineering;

use PhpOffice\UltimateSpreadSheet\Calculation\Engineering;
use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PHPUnit\Framework\TestCase;

class BesselYTest extends TestCase
{
    const BESSEL_PRECISION = 1E-8;

    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerBESSELY
     *
     * @param mixed $expectedResult
     */
    public function testBESSELY($expectedResult, ...$args)
    {
        $result = Engineering::BESSELY(...$args);
        $this->assertEquals($expectedResult, $result, '', self::BESSEL_PRECISION);
    }

    public function providerBESSELY()
    {
        return require 'data/Calculation/Engineering/BESSELY.php';
    }
}
