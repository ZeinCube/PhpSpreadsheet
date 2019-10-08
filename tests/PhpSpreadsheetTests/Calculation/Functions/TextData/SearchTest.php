<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\TextData;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\TextData;
use PhpOffice\UltimateSpreadSheet\Shared\StringHelper;
use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
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
     * @dataProvider providerSEARCH
     *
     * @param mixed $expectedResult
     */
    public function testSEARCH($expectedResult, ...$args)
    {
        $result = TextData::SEARCHINSENSITIVE(...$args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerSEARCH()
    {
        return require 'data/Calculation/TextData/SEARCH.php';
    }
}
