<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\LookupRef;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\LookupRef;
use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerINDEX
     *
     * @param mixed $expectedResult
     */
    public function testINDEX($expectedResult, ...$args)
    {
        $result = LookupRef::INDEX(...$args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerINDEX()
    {
        return require 'data/Calculation/LookupRef/INDEX.php';
    }
}
