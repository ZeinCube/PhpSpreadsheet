<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\TextData;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\TextData;
use PhpOffice\UltimateSpreadSheet\Shared\StringHelper;
use PHPUnit\Framework\TestCase;

class TextJoinTest extends TestCase
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
     * @dataProvider providerTEXTJOIN
     *
     * @param mixed $expectedResult
     * @param array $args
     */
    public function testTEXTJOIN($expectedResult, array $args)
    {
        $result = TextData::TEXTJOIN(...$args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerTEXTJOIN()
    {
        return require 'data/Calculation/TextData/TEXTJOIN.php';
    }
}
