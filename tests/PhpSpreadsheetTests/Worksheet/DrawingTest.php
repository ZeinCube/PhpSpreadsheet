<?php

namespace PhpOffice\PhpSpreadsheetTests\Worksheet;

use PhpOffice\UltimateSpreadSheet\Spreadsheet;
use PhpOffice\UltimateSpreadSheet\Worksheet\MemoryDrawing;
use PHPUnit\Framework\TestCase;

class DrawingTest extends TestCase
{
    public function testCloningWorksheetWithImages()
    {
        $spreadsheet = new Spreadsheet();
        $aSheet = $spreadsheet->getActiveSheet();

        $gdImage = @imagecreatetruecolor(120, 20);
        $textColor = imagecolorallocate($gdImage, 255, 255, 255);
        imagestring($gdImage, 1, 5, 5, 'Created with UltimateSpreadSheet', $textColor);

        $drawing = new MemoryDrawing();
        $drawing->setName('In-Memory image 1');
        $drawing->setDescription('In-Memory image 1');
        $drawing->setCoordinates('A1');
        $drawing->setImageResource($gdImage);
        $drawing->setRenderingFunction(
            MemoryDrawing::RENDERING_JPEG
        );
        $drawing->setMimeType(MemoryDrawing::MIMETYPE_DEFAULT);
        $drawing->setHeight(36);
        $drawing->setWorksheet($aSheet);

        $originDrawingCount = count($aSheet->getDrawingCollection());
        $clonedWorksheet = clone $aSheet;
        $clonedDrawingCount = count($clonedWorksheet->getDrawingCollection());

        self::assertEquals($originDrawingCount, $clonedDrawingCount);
        self::assertNotSame($aSheet, $clonedWorksheet);
        self::assertNotSame($aSheet->getDrawingCollection(), $clonedWorksheet->getDrawingCollection());
    }
}
