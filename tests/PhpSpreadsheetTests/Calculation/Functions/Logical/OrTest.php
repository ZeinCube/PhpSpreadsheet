<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Logical;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\Logical;
use PHPUnit\Framework\TestCase;

class OrTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerOR
     *
     * @param mixed $expectedResult
     */
    public function testOR($expectedResult, ...$args)
    {
        $result = Logical::logicalOr(...$args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerOR()
    {
        return require 'data/Calculation/Logical/OR.php';
    }
}
