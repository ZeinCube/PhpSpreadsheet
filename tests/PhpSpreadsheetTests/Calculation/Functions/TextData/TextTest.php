<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\TextData;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\TextData;
use PhpOffice\UltimateSpreadSheet\Shared\StringHelper;
use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
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
     * @dataProvider providerTEXT
     *
     * @param mixed $expectedResult
     */
    public function testTEXT($expectedResult, ...$args)
    {
        //    Enforce decimal and thousands separator values to UK/US, and currency code to USD
        StringHelper::setDecimalSeparator('.');
        StringHelper::setThousandsSeparator(',');
        StringHelper::setCurrencyCode('$');

        $result = TextData::TEXTFORMAT(...$args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerTEXT()
    {
        return require 'data/Calculation/TextData/TEXT.php';
    }
}
