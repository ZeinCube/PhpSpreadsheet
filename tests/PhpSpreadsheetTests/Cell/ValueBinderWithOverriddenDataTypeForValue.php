<?php

namespace PhpOffice\PhpSpreadsheetTests\Cell;

use PhpOffice\UltimateSpreadSheet\Cell\DefaultValueBinder;

class ValueBinderWithOverriddenDataTypeForValue extends DefaultValueBinder
{
    public static $called = false;

    public static function dataTypeForValue($pValue)
    {
        self::$called = true;

        return parent::dataTypeForValue($pValue);
    }
}
