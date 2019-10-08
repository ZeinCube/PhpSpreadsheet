<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\TextData;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\TextData;
use PhpOffice\UltimateSpreadSheet\Shared\StringHelper;
use PHPUnit\Framework\TestCase;

class NumberValueTest extends TestCase
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
     * @dataProvider providerNUMBERVALUE
     *
     * @param mixed $expectedResult
     * @param array $args
     */
    public function testNUMBERVALUE($expectedResult, array $args)
    {
        $result = TextData::NUMBERVALUE(...$args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerNUMBERVALUE()
    {
        return require 'data/Calculation/TextData/NUMBERVALUE.php';
    }
}
