<?php

namespace PhpOffice\PhpSpreadsheetTests\Functional;

use PhpOffice\UltimateSpreadSheet\Cell\Hyperlink;
use PhpOffice\UltimateSpreadSheet\Spreadsheet;
use PhpOffice\UltimateSpreadSheet\Worksheet\MemoryDrawing;

class DrawingImageHyperlinkTest extends AbstractFunctional
{
    public function testDrawingImageHyperlinkTest()
    {
        $baseUrl = 'https://github.com/PHPOffice/UltimateSpreadSheet';
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
        $hyperLink = new Hyperlink($baseUrl, 'test image');
        $drawing->setHyperlink($hyperLink);
        $drawing->setWorksheet($aSheet);

        $reloadedSpreadsheet = $this->writeAndReload($spreadsheet, 'Xlsx');

        foreach ($reloadedSpreadsheet->getActiveSheet()->getDrawingCollection() as $pDrawing) {
            self::assertEquals('https://github.com/PHPOffice/UltimateSpreadSheet', $pDrawing->getHyperlink()->getUrl(), 'functional test drawing hyperlink');
        }
    }
}
