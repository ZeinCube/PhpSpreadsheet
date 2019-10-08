<?php

use PhpOffice\UltimateSpreadSheet\IOFactory;
use PhpOffice\UltimateSpreadSheet\Worksheet\PageSetup;

require __DIR__ . '/../Header.php';
$spreadsheet = require __DIR__ . '/../templates/sampleSpreadsheet.php';

$helper->log('Hide grid lines');
$spreadsheet->getActiveSheet()->setShowGridLines(false);

$helper->log('Set orientation to landscape');
$spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);

$className = \PhpOffice\UltimateSpreadSheet\Writer\Pdf\Mpdf::class;
$helper->log("Write to PDF format using {$className}");
IOFactory::registerWriter('Pdf', $className);

// Save
$helper->write($spreadsheet, __FILE__, ['Pdf']);
