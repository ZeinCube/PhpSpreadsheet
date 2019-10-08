<?php

use PhpOffice\UltimateSpreadSheet\Spreadsheet;

require __DIR__ . '/../Header.php';
$inputFileType = 'Xlsx';

$helper->log('Start');

$spreadsheet = new Spreadsheet();

$aSheet = $spreadsheet->getActiveSheet();

$gdImage = @imagecreatetruecolor(120, 20);
$textColor = imagecolorallocate($gdImage, 255, 255, 255);
imagestring($gdImage, 1, 5, 5, 'Created with UltimateSpreadSheet', $textColor);

$baseUrl = 'https://phpspreadsheet.readthedocs.io';

$drawing = new \PhpOffice\UltimateSpreadSheet\Worksheet\MemoryDrawing();
$drawing->setName('In-Memory image 1');
$drawing->setDescription('In-Memory image 1');
$drawing->setCoordinates('A1');
$drawing->setImageResource($gdImage);
$drawing->setRenderingFunction(
    \PhpOffice\UltimateSpreadSheet\Worksheet\MemoryDrawing::RENDERING_JPEG
);
$drawing->setMimeType(\PhpOffice\UltimateSpreadSheet\Worksheet\MemoryDrawing::MIMETYPE_DEFAULT);
$drawing->setHeight(36);
$helper->log('Write image');

$hyperLink = new \PhpOffice\UltimateSpreadSheet\Cell\Hyperlink($baseUrl, 'test image');
$drawing->setHyperlink($hyperLink);
$helper->log('Write link: ' . $baseUrl);

$drawing->setWorksheet($aSheet);

$filename = tempnam(\PhpOffice\UltimateSpreadSheet\Shared\File::sysGetTempDir(), 'phpspreadsheet-test');

$writer = \PhpOffice\UltimateSpreadSheet\IOFactory::createWriter($spreadsheet, $inputFileType);
$writer->save($filename);

$reader = \PhpOffice\UltimateSpreadSheet\IOFactory::createReader($inputFileType);

$reloadedSpreadsheet = $reader->load($filename);
unlink($filename);

$helper->log('reloaded Spreadsheet');

foreach ($reloadedSpreadsheet->getActiveSheet()->getDrawingCollection() as $pDrawing) {
    $helper->log('Read link: ' . $pDrawing->getHyperlink()->getUrl());
}

$helper->log('end');
