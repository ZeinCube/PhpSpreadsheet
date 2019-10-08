<?php

namespace PhpOffice\UltimateSpreadSheet\Writer\Ods;

use PhpOffice\UltimateSpreadSheet\Spreadsheet;

class Thumbnails extends WriterPart
{
    /**
     * Write Thumbnails/thumbnail.png to PNG format.
     *
     * @param Spreadsheet $spreadsheet
     *
     * @return string XML Output
     */
    public function writeThumbnail(Spreadsheet $spreadsheet = null)
    {
        return '';
    }
}
