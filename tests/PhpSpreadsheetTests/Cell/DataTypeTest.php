<?php

namespace PhpOffice\PhpSpreadsheetTests\Cell;

use PhpOffice\UltimateSpreadSheet\Cell\DataType;
use PHPUnit\Framework\TestCase;

class DataTypeTest extends TestCase
{
    public function testGetErrorCodes()
    {
        $result = DataType::getErrorCodes();
        self::assertIsArray($result);
        self::assertGreaterThan(0, count($result));
        self::assertArrayHasKey('#NULL!', $result);
    }
}
