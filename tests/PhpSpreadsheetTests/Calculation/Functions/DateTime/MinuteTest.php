<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\DateTime;

use PhpOffice\UltimateSpreadSheet\Calculation\DateTime;
use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Shared\Date;
use PHPUnit\Framework\TestCase;

class MinuteTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
        Functions::setReturnDateType(Functions::RETURNDATE_EXCEL);
        Date::setExcelCalendar(Date::CALENDAR_WINDOWS_1900);
    }

    /**
     * @dataProvider providerMINUTE
     *
     * @param mixed $expectedResult
     * @param $dateTimeValue
     */
    public function testMINUTE($expectedResult, $dateTimeValue)
    {
        $result = DateTime::MINUTE($dateTimeValue);
        $this->assertEquals($expectedResult, $result, '', 1E-8);
    }

    public function providerMINUTE()
    {
        return require 'data/Calculation/DateTime/MINUTE.php';
    }
}
