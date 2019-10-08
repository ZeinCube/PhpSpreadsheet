<?php

use PhpOffice\UltimateSpreadSheet\IOFactory;

require __DIR__ . '/../Header.php';

$inputFileType = 'Xlsx';
$inputFileName = __DIR__ . '/sampleData/example1.xlsx';

// Create a new Reader of the type defined in $inputFileType
$reader = IOFactory::createReader($inputFileType);
// Load $inputFileName to a UltimateSpreadSheet Object
$spreadsheet = $reader->load($inputFileName);

// Read an array list of any custom properties for this document
$customPropertyList = $spreadsheet->getProperties()->getCustomProperties();

foreach ($customPropertyList as $customPropertyName) {
    $helper->log($customPropertyName);
}
