<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Logical;

use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\UltimateSpreadSheet\Calculation\Logical;
use PHPUnit\Framework\TestCase;

class FalseTest extends TestCase
{
    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    public function testFALSE()
    {
        $result = Logical::FALSE();
        $this->assertFalse($result);
    }
}
