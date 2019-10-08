<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Engineering;

use PhpOffice\UltimateSpreadSheet\Calculation\Engineering;
use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PHPUnit\Framework\TestCase;

class BitOrTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerBITOR
     *
     * @param mixed $expectedResult
     * @param mixed[] $args
     */
    public function testBITOR($expectedResult, array $args)
    {
        $result = Engineering::BITOR(...$args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerBITOR()
    {
        return require 'data/Calculation/Engineering/BITOR.php';
    }
}
