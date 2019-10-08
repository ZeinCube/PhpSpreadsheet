<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\DateTime;

use PhpOffice\UltimateSpreadSheet\Calculation\DateTime;
use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Shared\Date;
use PHPUnit\Framework\TestCase;

class WeekDayTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
        Functions::setReturnDateType(Functions::RETURNDATE_EXCEL);
        Date::setExcelCalendar(Date::CALENDAR_WINDOWS_1900);
    }

    /**
     * @dataProvider providerWEEKDAY
     *
     * @param mixed $expectedResult
     */
    public function testWEEKDAY($expectedResult, ...$args)
    {
        $result = DateTime::WEEKDAY(...$args);
        $this->assertEquals($expectedResult, $result, '', 1E-8);
    }

    public function providerWEEKDAY()
    {
        return require 'data/Calculation/DateTime/WEEKDAY.php';
    }
}
