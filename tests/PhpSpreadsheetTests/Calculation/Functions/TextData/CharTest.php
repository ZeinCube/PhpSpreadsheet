<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\TextData;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\TextData;
use PhpOffice\UltimateSpreadSheet\Shared\StringHelper;
use PHPUnit\Framework\TestCase;

class CharTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
        StringHelper::setDecimalSeparator('.');
        StringHelper::setThousandsSeparator(',');
        StringHelper::setCurrencyCode('$');
    }

    public function tearDown()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
        StringHelper::setDecimalSeparator('.');
        StringHelper::setThousandsSeparator(',');
        StringHelper::setCurrencyCode('$');
    }

    /**
     * @dataProvider providerCHAR
     *
     * @param mixed $expectedResult
     * @param $character
     */
    public function testCHAR($expectedResult, $character)
    {
        $result = TextData::CHARACTER($character);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerCHAR()
    {
        return require 'data/Calculation/TextData/CHAR.php';
    }
}
