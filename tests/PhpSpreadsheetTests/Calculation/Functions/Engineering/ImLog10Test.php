<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Engineering;

use PhpOffice\UltimateSpreadSheet\Calculation\Engineering;
use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheetTests\Custom\ComplexAssert;
use PHPUnit\Framework\TestCase;

class ImLog10Test extends TestCase
{
    const COMPLEX_PRECISION = 1E-8;

    /**
     * @var ComplexAssert
     */
    protected $complexAssert;

    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
        $this->complexAssert = new ComplexAssert();
    }

    public function tearDown()
    {
        $this->complexAssert = null;
    }

    /**
     * @dataProvider providerIMLOG10
     *
     * @param mixed $expectedResult
     * @param mixed $value
     */
    public function testIMLOG10($expectedResult, $value)
    {
        $result = Engineering::IMLOG10($value);
        $this->assertTrue(
            $this->complexAssert->assertComplexEquals($expectedResult, $result, self::COMPLEX_PRECISION),
            $this->complexAssert->getErrorMessage()
        );
    }

    public function providerIMLOG10()
    {
        return require 'data/Calculation/Engineering/IMLOG10.php';
    }
}
