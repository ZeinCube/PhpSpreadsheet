<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Logical;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\Logical;
use PHPUnit\Framework\TestCase;

class NotTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerNOT
     *
     * @param mixed $expectedResult
     */
    public function testNOT($expectedResult, ...$args)
    {
        $result = Logical::NOT(...$args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerNOT()
    {
        return require 'data/Calculation/Logical/NOT.php';
    }
}
