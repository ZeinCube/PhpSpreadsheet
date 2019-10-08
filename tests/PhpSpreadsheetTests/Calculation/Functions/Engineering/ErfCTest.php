<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Engineering;

use PhpOffice\UltimateSpreadSheet\Calculation\Engineering;
use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PHPUnit\Framework\TestCase;

class ErfCTest extends TestCase
{
    const ERF_PRECISION = 1E-12;

    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerERFC
     *
     * @param mixed $expectedResult
     */
    public function testERFC($expectedResult, ...$args)
    {
        $result = Engineering::ERFC(...$args);
        $this->assertEquals($expectedResult, $result, '', self::ERF_PRECISION);
    }

    public function providerERFC()
    {
        return require 'data/Calculation/Engineering/ERFC.php';
    }
}
