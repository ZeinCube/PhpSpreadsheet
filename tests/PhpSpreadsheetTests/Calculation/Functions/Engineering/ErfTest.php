<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Engineering;

use PhpOffice\UltimateSpreadSheet\Calculation\Engineering;
use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PHPUnit\Framework\TestCase;

class ErfTest extends TestCase
{
    const ERF_PRECISION = 1E-12;

    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerERF
     *
     * @param mixed $expectedResult
     */
    public function testERF($expectedResult, ...$args)
    {
        $result = Engineering::ERF(...$args);
        $this->assertEquals($expectedResult, $result, '', self::ERF_PRECISION);
    }

    public function providerERF()
    {
        return require 'data/Calculation/Engineering/ERF.php';
    }
}
