<?php

namespace PhpOffice\PhpSpreadsheetTests\Calculation\Functions\Engineering;

use PhpOffice\UltimateSpreadSheet\Calculation\Engineering;
use PhpOffice\UltimateSpreadSheet\Calculation\Functions;
use PhpOffice\PhpSpreadsheetTests\Custom\ComplexAssert;
use PHPUnit\Framework\TestCase;

class ImSecTest extends TestCase
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
     * @dataProvider providerIMSEC
     *
     * @param mixed $expectedResult
     * @param mixed $value
     */
    public function testIMSEC($expectedResult, $value)
    {
        $result = Engineering::IMSEC($value);
        $this->assertTrue(
            $this->complexAssert->assertComplexEquals($expectedResult, $result, self::COMPLEX_PRECISION),
            $this->complexAssert->getErrorMessage()
        );
    }

    public function providerIMSEC()
    {
        return require 'data/Calculation/Engineering/IMSEC.php';
    }
}
