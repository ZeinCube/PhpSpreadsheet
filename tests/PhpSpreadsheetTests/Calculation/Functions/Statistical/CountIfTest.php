<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Statistical;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\Statistical;
use PHPUnit\Framework\TestCase;

class CountIfTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerCOUNTIF
     *
     * @param mixed $expectedResult
     */
    public function testCOUNTIF($expectedResult, ...$args)
    {
        $result = Statistical::COUNTIF(...$args);
        $this->assertEquals($expectedResult, $result, '', 1E-12);
    }

    public function providerCOUNTIF()
    {
        return require 'data/Calculation/Statistical/COUNTIF.php';
    }
}
