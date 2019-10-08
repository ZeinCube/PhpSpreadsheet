<?php

namespace PhpOffice\UltimateSpreadSheet\Helper;

class Migrator
{
    /**
     * @var string[]
     */
    private $from;

    /**
     * @var string[]
     */
    private $to;

    public function __construct()
    {
        $this->from = array_keys($this->getMapping());
        $this->to = array_values($this->getMapping());
    }

    /**
     * Return the ordered mapping from old PHPExcel class names to new UltimateSpreadSheet one.
     *
     * @return string[]
     */
    public function getMapping()
    {
        // Order matters here, we should have the deepest namespaces first (the most "unique" strings)
        $classes = [
            'PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE_Blip' => \PhpOffice\UltimateSpreadSheet\Shared\Escher\DggContainer\BstoreContainer\BSE\Blip::class,
            'PHPExcel_Shared_Escher_DgContainer_SpgrContainer_SpContainer' => \PhpOffice\UltimateSpreadSheet\Shared\Escher\DgContainer\SpgrContainer\SpContainer::class,
            'PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE' => \PhpOffice\UltimateSpreadSheet\Shared\Escher\DggContainer\BstoreContainer\BSE::class,
            'PHPExcel_Shared_Escher_DgContainer_SpgrContainer' => \PhpOffice\UltimateSpreadSheet\Shared\Escher\DgContainer\SpgrContainer::class,
            'PHPExcel_Shared_Escher_DggContainer_BstoreContainer' => \PhpOffice\UltimateSpreadSheet\Shared\Escher\DggContainer\BstoreContainer::class,
            'PHPExcel_Shared_OLE_PPS_File' => \PhpOffice\UltimateSpreadSheet\Shared\OLE\PPS\File::class,
            'PHPExcel_Shared_OLE_PPS_Root' => \PhpOffice\UltimateSpreadSheet\Shared\OLE\PPS\Root::class,
            'PHPExcel_Worksheet_AutoFilter_Column_Rule' => \PhpOffice\UltimateSpreadSheet\Worksheet\AutoFilter\Column\Rule::class,
            'PHPExcel_Writer_OpenDocument_Cell_Comment' => \PhpOffice\UltimateSpreadSheet\Writer\Ods\Cell\Comment::class,
            'PHPExcel_Calculation_Token_Stack' => \PhpOffice\UltimateSpreadSheet\Calculation\Token\Stack::class,
            'PHPExcel_Chart_Renderer_jpgraph' => \PhpOffice\UltimateSpreadSheet\Chart\Renderer\JpGraph::class,
            'PHPExcel_Reader_Excel5_Escher' => \PhpOffice\UltimateSpreadSheet\Reader\Xls\Escher::class,
            'PHPExcel_Reader_Excel5_MD5' => \PhpOffice\UltimateSpreadSheet\Reader\Xls\MD5::class,
            'PHPExcel_Reader_Excel5_RC4' => \PhpOffice\UltimateSpreadSheet\Reader\Xls\RC4::class,
            'PHPExcel_Reader_Excel2007_Chart' => \PhpOffice\UltimateSpreadSheet\Reader\Xlsx\Chart::class,
            'PHPExcel_Reader_Excel2007_Theme' => \PhpOffice\UltimateSpreadSheet\Reader\Xlsx\Theme::class,
            'PHPExcel_Shared_Escher_DgContainer' => \PhpOffice\UltimateSpreadSheet\Shared\Escher\DgContainer::class,
            'PHPExcel_Shared_Escher_DggContainer' => \PhpOffice\UltimateSpreadSheet\Shared\Escher\DggContainer::class,
            'CholeskyDecomposition' => \PhpOffice\UltimateSpreadSheet\Shared\JAMA\CholeskyDecomposition::class,
            'EigenvalueDecomposition' => \PhpOffice\UltimateSpreadSheet\Shared\JAMA\EigenvalueDecomposition::class,
            'PHPExcel_Shared_JAMA_LUDecomposition' => \PhpOffice\UltimateSpreadSheet\Shared\JAMA\LUDecomposition::class,
            'PHPExcel_Shared_JAMA_Matrix' => \PhpOffice\UltimateSpreadSheet\Shared\JAMA\Matrix::class,
            'QRDecomposition' => \PhpOffice\UltimateSpreadSheet\Shared\JAMA\QRDecomposition::class,
            'PHPExcel_Shared_JAMA_QRDecomposition' => \PhpOffice\UltimateSpreadSheet\Shared\JAMA\QRDecomposition::class,
            'SingularValueDecomposition' => \PhpOffice\UltimateSpreadSheet\Shared\JAMA\SingularValueDecomposition::class,
            'PHPExcel_Shared_OLE_ChainedBlockStream' => \PhpOffice\UltimateSpreadSheet\Shared\OLE\ChainedBlockStream::class,
            'PHPExcel_Shared_OLE_PPS' => \PhpOffice\UltimateSpreadSheet\Shared\OLE\PPS::class,
            'PHPExcel_Best_Fit' => \PhpOffice\UltimateSpreadSheet\Shared\Trend\BestFit::class,
            'PHPExcel_Exponential_Best_Fit' => \PhpOffice\UltimateSpreadSheet\Shared\Trend\ExponentialBestFit::class,
            'PHPExcel_Linear_Best_Fit' => \PhpOffice\UltimateSpreadSheet\Shared\Trend\LinearBestFit::class,
            'PHPExcel_Logarithmic_Best_Fit' => \PhpOffice\UltimateSpreadSheet\Shared\Trend\LogarithmicBestFit::class,
            'polynomialBestFit' => \PhpOffice\UltimateSpreadSheet\Shared\Trend\PolynomialBestFit::class,
            'PHPExcel_Polynomial_Best_Fit' => \PhpOffice\UltimateSpreadSheet\Shared\Trend\PolynomialBestFit::class,
            'powerBestFit' => \PhpOffice\UltimateSpreadSheet\Shared\Trend\PowerBestFit::class,
            'PHPExcel_Power_Best_Fit' => \PhpOffice\UltimateSpreadSheet\Shared\Trend\PowerBestFit::class,
            'trendClass' => \PhpOffice\UltimateSpreadSheet\Shared\Trend\Trend::class,
            'PHPExcel_Worksheet_AutoFilter_Column' => \PhpOffice\UltimateSpreadSheet\Worksheet\AutoFilter\Column::class,
            'PHPExcel_Worksheet_Drawing_Shadow' => \PhpOffice\UltimateSpreadSheet\Worksheet\Drawing\Shadow::class,
            'PHPExcel_Writer_OpenDocument_Content' => \PhpOffice\UltimateSpreadSheet\Writer\Ods\Content::class,
            'PHPExcel_Writer_OpenDocument_Meta' => \PhpOffice\UltimateSpreadSheet\Writer\Ods\Meta::class,
            'PHPExcel_Writer_OpenDocument_MetaInf' => \PhpOffice\UltimateSpreadSheet\Writer\Ods\MetaInf::class,
            'PHPExcel_Writer_OpenDocument_Mimetype' => \PhpOffice\UltimateSpreadSheet\Writer\Ods\Mimetype::class,
            'PHPExcel_Writer_OpenDocument_Settings' => \PhpOffice\UltimateSpreadSheet\Writer\Ods\Settings::class,
            'PHPExcel_Writer_OpenDocument_Styles' => \PhpOffice\UltimateSpreadSheet\Writer\Ods\Styles::class,
            'PHPExcel_Writer_OpenDocument_Thumbnails' => \PhpOffice\UltimateSpreadSheet\Writer\Ods\Thumbnails::class,
            'PHPExcel_Writer_OpenDocument_WriterPart' => \PhpOffice\UltimateSpreadSheet\Writer\Ods\WriterPart::class,
            'PHPExcel_Writer_PDF_Core' => \PhpOffice\UltimateSpreadSheet\Writer\Pdf::class,
            'PHPExcel_Writer_PDF_DomPDF' => \PhpOffice\UltimateSpreadSheet\Writer\Pdf\Dompdf::class,
            'PHPExcel_Writer_PDF_mPDF' => \PhpOffice\UltimateSpreadSheet\Writer\Pdf\Mpdf::class,
            'PHPExcel_Writer_PDF_tcPDF' => \PhpOffice\UltimateSpreadSheet\Writer\Pdf\Tcpdf::class,
            'PHPExcel_Writer_Excel5_BIFFwriter' => \PhpOffice\UltimateSpreadSheet\Writer\Xls\BIFFwriter::class,
            'PHPExcel_Writer_Excel5_Escher' => \PhpOffice\UltimateSpreadSheet\Writer\Xls\Escher::class,
            'PHPExcel_Writer_Excel5_Font' => \PhpOffice\UltimateSpreadSheet\Writer\Xls\Font::class,
            'PHPExcel_Writer_Excel5_Parser' => \PhpOffice\UltimateSpreadSheet\Writer\Xls\Parser::class,
            'PHPExcel_Writer_Excel5_Workbook' => \PhpOffice\UltimateSpreadSheet\Writer\Xls\Workbook::class,
            'PHPExcel_Writer_Excel5_Worksheet' => \PhpOffice\UltimateSpreadSheet\Writer\Xls\Worksheet::class,
            'PHPExcel_Writer_Excel5_Xf' => \PhpOffice\UltimateSpreadSheet\Writer\Xls\Xf::class,
            'PHPExcel_Writer_Excel2007_Chart' => \PhpOffice\UltimateSpreadSheet\Writer\Xlsx\Chart::class,
            'PHPExcel_Writer_Excel2007_Comments' => \PhpOffice\UltimateSpreadSheet\Writer\Xlsx\Comments::class,
            'PHPExcel_Writer_Excel2007_ContentTypes' => \PhpOffice\UltimateSpreadSheet\Writer\Xlsx\ContentTypes::class,
            'PHPExcel_Writer_Excel2007_DocProps' => \PhpOffice\UltimateSpreadSheet\Writer\Xlsx\DocProps::class,
            'PHPExcel_Writer_Excel2007_Drawing' => \PhpOffice\UltimateSpreadSheet\Writer\Xlsx\Drawing::class,
            'PHPExcel_Writer_Excel2007_Rels' => \PhpOffice\UltimateSpreadSheet\Writer\Xlsx\Rels::class,
            'PHPExcel_Writer_Excel2007_RelsRibbon' => \PhpOffice\UltimateSpreadSheet\Writer\Xlsx\RelsRibbon::class,
            'PHPExcel_Writer_Excel2007_RelsVBA' => \PhpOffice\UltimateSpreadSheet\Writer\Xlsx\RelsVBA::class,
            'PHPExcel_Writer_Excel2007_StringTable' => \PhpOffice\UltimateSpreadSheet\Writer\Xlsx\StringTable::class,
            'PHPExcel_Writer_Excel2007_Style' => \PhpOffice\UltimateSpreadSheet\Writer\Xlsx\Style::class,
            'PHPExcel_Writer_Excel2007_Theme' => \PhpOffice\UltimateSpreadSheet\Writer\Xlsx\Theme::class,
            'PHPExcel_Writer_Excel2007_Workbook' => \PhpOffice\UltimateSpreadSheet\Writer\Xlsx\Workbook::class,
            'PHPExcel_Writer_Excel2007_Worksheet' => \PhpOffice\UltimateSpreadSheet\Writer\Xlsx\Worksheet::class,
            'PHPExcel_Writer_Excel2007_WriterPart' => \PhpOffice\UltimateSpreadSheet\Writer\Xlsx\WriterPart::class,
            'PHPExcel_CachedObjectStorage_CacheBase' => \PhpOffice\UltimateSpreadSheet\Collection\Cells::class,
            'PHPExcel_CalcEngine_CyclicReferenceStack' => \PhpOffice\UltimateSpreadSheet\Calculation\Engine\CyclicReferenceStack::class,
            'PHPExcel_CalcEngine_Logger' => \PhpOffice\UltimateSpreadSheet\Calculation\Engine\Logger::class,
            'PHPExcel_Calculation_Functions' => \PhpOffice\UltimateSpreadSheet\Calculation\Functions::class,
            'PHPExcel_Calculation_Function' => \PhpOffice\UltimateSpreadSheet\Calculation\Category::class,
            'PHPExcel_Calculation_Database' => \PhpOffice\UltimateSpreadSheet\Calculation\Database::class,
            'PHPExcel_Calculation_DateTime' => \PhpOffice\UltimateSpreadSheet\Calculation\DateTime::class,
            'PHPExcel_Calculation_Engineering' => \PhpOffice\UltimateSpreadSheet\Calculation\Engineering::class,
            'PHPExcel_Calculation_Exception' => \PhpOffice\UltimateSpreadSheet\Calculation\Exception::class,
            'PHPExcel_Calculation_ExceptionHandler' => \PhpOffice\UltimateSpreadSheet\Calculation\ExceptionHandler::class,
            'PHPExcel_Calculation_Financial' => \PhpOffice\UltimateSpreadSheet\Calculation\Financial::class,
            'PHPExcel_Calculation_FormulaParser' => \PhpOffice\UltimateSpreadSheet\Calculation\FormulaParser::class,
            'PHPExcel_Calculation_FormulaToken' => \PhpOffice\UltimateSpreadSheet\Calculation\FormulaToken::class,
            'PHPExcel_Calculation_Logical' => \PhpOffice\UltimateSpreadSheet\Calculation\Logical::class,
            'PHPExcel_Calculation_LookupRef' => \PhpOffice\UltimateSpreadSheet\Calculation\LookupRef::class,
            'PHPExcel_Calculation_MathTrig' => \PhpOffice\UltimateSpreadSheet\Calculation\MathTrig::class,
            'PHPExcel_Calculation_Statistical' => \PhpOffice\UltimateSpreadSheet\Calculation\Statistical::class,
            'PHPExcel_Calculation_TextData' => \PhpOffice\UltimateSpreadSheet\Calculation\TextData::class,
            'PHPExcel_Cell_AdvancedValueBinder' => \PhpOffice\UltimateSpreadSheet\Cell\AdvancedValueBinder::class,
            'PHPExcel_Cell_DataType' => \PhpOffice\UltimateSpreadSheet\Cell\DataType::class,
            'PHPExcel_Cell_DataValidation' => \PhpOffice\UltimateSpreadSheet\Cell\DataValidation::class,
            'PHPExcel_Cell_DefaultValueBinder' => \PhpOffice\UltimateSpreadSheet\Cell\DefaultValueBinder::class,
            'PHPExcel_Cell_Hyperlink' => \PhpOffice\UltimateSpreadSheet\Cell\Hyperlink::class,
            'PHPExcel_Cell_IValueBinder' => \PhpOffice\UltimateSpreadSheet\Cell\IValueBinder::class,
            'PHPExcel_Chart_Axis' => \PhpOffice\UltimateSpreadSheet\Chart\Axis::class,
            'PHPExcel_Chart_DataSeries' => \PhpOffice\UltimateSpreadSheet\Chart\DataSeries::class,
            'PHPExcel_Chart_DataSeriesValues' => \PhpOffice\UltimateSpreadSheet\Chart\DataSeriesValues::class,
            'PHPExcel_Chart_Exception' => \PhpOffice\UltimateSpreadSheet\Chart\Exception::class,
            'PHPExcel_Chart_GridLines' => \PhpOffice\UltimateSpreadSheet\Chart\GridLines::class,
            'PHPExcel_Chart_Layout' => \PhpOffice\UltimateSpreadSheet\Chart\Layout::class,
            'PHPExcel_Chart_Legend' => \PhpOffice\UltimateSpreadSheet\Chart\Legend::class,
            'PHPExcel_Chart_PlotArea' => \PhpOffice\UltimateSpreadSheet\Chart\PlotArea::class,
            'PHPExcel_Properties' => \PhpOffice\UltimateSpreadSheet\Chart\Properties::class,
            'PHPExcel_Chart_Title' => \PhpOffice\UltimateSpreadSheet\Chart\Title::class,
            'PHPExcel_DocumentProperties' => \PhpOffice\UltimateSpreadSheet\Document\Properties::class,
            'PHPExcel_DocumentSecurity' => \PhpOffice\UltimateSpreadSheet\Document\Security::class,
            'PHPExcel_Helper_HTML' => \PhpOffice\UltimateSpreadSheet\Helper\Html::class,
            'PHPExcel_Reader_Abstract' => \PhpOffice\UltimateSpreadSheet\Reader\BaseReader::class,
            'PHPExcel_Reader_CSV' => \PhpOffice\UltimateSpreadSheet\Reader\Csv::class,
            'PHPExcel_Reader_DefaultReadFilter' => \PhpOffice\UltimateSpreadSheet\Reader\DefaultReadFilter::class,
            'PHPExcel_Reader_Excel2003XML' => \PhpOffice\UltimateSpreadSheet\Reader\Xml::class,
            'PHPExcel_Reader_Exception' => \PhpOffice\UltimateSpreadSheet\Reader\Exception::class,
            'PHPExcel_Reader_Gnumeric' => \PhpOffice\UltimateSpreadSheet\Reader\Gnumeric::class,
            'PHPExcel_Reader_HTML' => \PhpOffice\UltimateSpreadSheet\Reader\Html::class,
            'PHPExcel_Reader_IReadFilter' => \PhpOffice\UltimateSpreadSheet\Reader\IReadFilter::class,
            'PHPExcel_Reader_IReader' => \PhpOffice\UltimateSpreadSheet\Reader\IReader::class,
            'PHPExcel_Reader_OOCalc' => \PhpOffice\UltimateSpreadSheet\Reader\Ods::class,
            'PHPExcel_Reader_SYLK' => \PhpOffice\UltimateSpreadSheet\Reader\Slk::class,
            'PHPExcel_Reader_Excel5' => \PhpOffice\UltimateSpreadSheet\Reader\Xls::class,
            'PHPExcel_Reader_Excel2007' => \PhpOffice\UltimateSpreadSheet\Reader\Xlsx::class,
            'PHPExcel_RichText_ITextElement' => \PhpOffice\UltimateSpreadSheet\RichText\ITextElement::class,
            'PHPExcel_RichText_Run' => \PhpOffice\UltimateSpreadSheet\RichText\Run::class,
            'PHPExcel_RichText_TextElement' => \PhpOffice\UltimateSpreadSheet\RichText\TextElement::class,
            'PHPExcel_Shared_CodePage' => \PhpOffice\UltimateSpreadSheet\Shared\CodePage::class,
            'PHPExcel_Shared_Date' => \PhpOffice\UltimateSpreadSheet\Shared\Date::class,
            'PHPExcel_Shared_Drawing' => \PhpOffice\UltimateSpreadSheet\Shared\Drawing::class,
            'PHPExcel_Shared_Escher' => \PhpOffice\UltimateSpreadSheet\Shared\Escher::class,
            'PHPExcel_Shared_File' => \PhpOffice\UltimateSpreadSheet\Shared\File::class,
            'PHPExcel_Shared_Font' => \PhpOffice\UltimateSpreadSheet\Shared\Font::class,
            'PHPExcel_Shared_OLE' => \PhpOffice\UltimateSpreadSheet\Shared\OLE::class,
            'PHPExcel_Shared_OLERead' => \PhpOffice\UltimateSpreadSheet\Shared\OLERead::class,
            'PHPExcel_Shared_PasswordHasher' => \PhpOffice\UltimateSpreadSheet\Shared\PasswordHasher::class,
            'PHPExcel_Shared_String' => \PhpOffice\UltimateSpreadSheet\Shared\StringHelper::class,
            'PHPExcel_Shared_TimeZone' => \PhpOffice\UltimateSpreadSheet\Shared\TimeZone::class,
            'PHPExcel_Shared_XMLWriter' => \PhpOffice\UltimateSpreadSheet\Shared\XMLWriter::class,
            'PHPExcel_Shared_Excel5' => \PhpOffice\UltimateSpreadSheet\Shared\Xls::class,
            'PHPExcel_Style_Alignment' => \PhpOffice\UltimateSpreadSheet\Style\Alignment::class,
            'PHPExcel_Style_Border' => \PhpOffice\UltimateSpreadSheet\Style\Border::class,
            'PHPExcel_Style_Borders' => \PhpOffice\UltimateSpreadSheet\Style\Borders::class,
            'PHPExcel_Style_Color' => \PhpOffice\UltimateSpreadSheet\Style\Color::class,
            'PHPExcel_Style_Conditional' => \PhpOffice\UltimateSpreadSheet\Style\Conditional::class,
            'PHPExcel_Style_Fill' => \PhpOffice\UltimateSpreadSheet\Style\Fill::class,
            'PHPExcel_Style_Font' => \PhpOffice\UltimateSpreadSheet\Style\Font::class,
            'PHPExcel_Style_NumberFormat' => \PhpOffice\UltimateSpreadSheet\Style\NumberFormat::class,
            'PHPExcel_Style_Protection' => \PhpOffice\UltimateSpreadSheet\Style\Protection::class,
            'PHPExcel_Style_Supervisor' => \PhpOffice\UltimateSpreadSheet\Style\Supervisor::class,
            'PHPExcel_Worksheet_AutoFilter' => \PhpOffice\UltimateSpreadSheet\Worksheet\AutoFilter::class,
            'PHPExcel_Worksheet_BaseDrawing' => \PhpOffice\UltimateSpreadSheet\Worksheet\BaseDrawing::class,
            'PHPExcel_Worksheet_CellIterator' => \PhpOffice\UltimateSpreadSheet\Worksheet\CellIterator::class,
            'PHPExcel_Worksheet_Column' => \PhpOffice\UltimateSpreadSheet\Worksheet\Column::class,
            'PHPExcel_Worksheet_ColumnCellIterator' => \PhpOffice\UltimateSpreadSheet\Worksheet\ColumnCellIterator::class,
            'PHPExcel_Worksheet_ColumnDimension' => \PhpOffice\UltimateSpreadSheet\Worksheet\ColumnDimension::class,
            'PHPExcel_Worksheet_ColumnIterator' => \PhpOffice\UltimateSpreadSheet\Worksheet\ColumnIterator::class,
            'PHPExcel_Worksheet_Drawing' => \PhpOffice\UltimateSpreadSheet\Worksheet\Drawing::class,
            'PHPExcel_Worksheet_HeaderFooter' => \PhpOffice\UltimateSpreadSheet\Worksheet\HeaderFooter::class,
            'PHPExcel_Worksheet_HeaderFooterDrawing' => \PhpOffice\UltimateSpreadSheet\Worksheet\HeaderFooterDrawing::class,
            'PHPExcel_WorksheetIterator' => \PhpOffice\UltimateSpreadSheet\Worksheet\Iterator::class,
            'PHPExcel_Worksheet_MemoryDrawing' => \PhpOffice\UltimateSpreadSheet\Worksheet\MemoryDrawing::class,
            'PHPExcel_Worksheet_PageMargins' => \PhpOffice\UltimateSpreadSheet\Worksheet\PageMargins::class,
            'PHPExcel_Worksheet_PageSetup' => \PhpOffice\UltimateSpreadSheet\Worksheet\PageSetup::class,
            'PHPExcel_Worksheet_Protection' => \PhpOffice\UltimateSpreadSheet\Worksheet\Protection::class,
            'PHPExcel_Worksheet_Row' => \PhpOffice\UltimateSpreadSheet\Worksheet\Row::class,
            'PHPExcel_Worksheet_RowCellIterator' => \PhpOffice\UltimateSpreadSheet\Worksheet\RowCellIterator::class,
            'PHPExcel_Worksheet_RowDimension' => \PhpOffice\UltimateSpreadSheet\Worksheet\RowDimension::class,
            'PHPExcel_Worksheet_RowIterator' => \PhpOffice\UltimateSpreadSheet\Worksheet\RowIterator::class,
            'PHPExcel_Worksheet_SheetView' => \PhpOffice\UltimateSpreadSheet\Worksheet\SheetView::class,
            'PHPExcel_Writer_Abstract' => \PhpOffice\UltimateSpreadSheet\Writer\BaseWriter::class,
            'PHPExcel_Writer_CSV' => \PhpOffice\UltimateSpreadSheet\Writer\Csv::class,
            'PHPExcel_Writer_Exception' => \PhpOffice\UltimateSpreadSheet\Writer\Exception::class,
            'PHPExcel_Writer_HTML' => \PhpOffice\UltimateSpreadSheet\Writer\Html::class,
            'PHPExcel_Writer_IWriter' => \PhpOffice\UltimateSpreadSheet\Writer\IWriter::class,
            'PHPExcel_Writer_OpenDocument' => \PhpOffice\UltimateSpreadSheet\Writer\Ods::class,
            'PHPExcel_Writer_PDF' => \PhpOffice\UltimateSpreadSheet\Writer\Pdf::class,
            'PHPExcel_Writer_Excel5' => \PhpOffice\UltimateSpreadSheet\Writer\Xls::class,
            'PHPExcel_Writer_Excel2007' => \PhpOffice\UltimateSpreadSheet\Writer\Xlsx::class,
            'PHPExcel_CachedObjectStorageFactory' => \PhpOffice\UltimateSpreadSheet\Collection\CellsFactory::class,
            'PHPExcel_Calculation' => \PhpOffice\UltimateSpreadSheet\Calculation\Calculation::class,
            'PHPExcel_Cell' => \PhpOffice\UltimateSpreadSheet\Cell\Cell::class,
            'PHPExcel_Chart' => \PhpOffice\UltimateSpreadSheet\Chart\Chart::class,
            'PHPExcel_Comment' => \PhpOffice\UltimateSpreadSheet\Comment::class,
            'PHPExcel_Exception' => \PhpOffice\UltimateSpreadSheet\Exception::class,
            'PHPExcel_HashTable' => \PhpOffice\UltimateSpreadSheet\HashTable::class,
            'PHPExcel_IComparable' => \PhpOffice\UltimateSpreadSheet\IComparable::class,
            'PHPExcel_IOFactory' => \PhpOffice\UltimateSpreadSheet\IOFactory::class,
            'PHPExcel_NamedRange' => \PhpOffice\UltimateSpreadSheet\NamedRange::class,
            'PHPExcel_ReferenceHelper' => \PhpOffice\UltimateSpreadSheet\ReferenceHelper::class,
            'PHPExcel_RichText' => \PhpOffice\UltimateSpreadSheet\RichText\RichText::class,
            'PHPExcel_Settings' => \PhpOffice\UltimateSpreadSheet\Settings::class,
            'PHPExcel_Style' => \PhpOffice\UltimateSpreadSheet\Style\Style::class,
            'PHPExcel_Worksheet' => \PhpOffice\UltimateSpreadSheet\Worksheet\Worksheet::class,
        ];

        $methods = [
            'MINUTEOFHOUR' => 'MINUTE',
            'SECONDOFMINUTE' => 'SECOND',
            'DAYOFWEEK' => 'WEEKDAY',
            'WEEKOFYEAR' => 'WEEKNUM',
            'ExcelToPHPObject' => 'excelToDateTimeObject',
            'ExcelToPHP' => 'excelToTimestamp',
            'FormattedPHPToExcel' => 'formattedPHPToExcel',
            'Cell::absoluteCoordinate' => 'Coordinate::absoluteCoordinate',
            'Cell::absoluteReference' => 'Coordinate::absoluteReference',
            'Cell::buildRange' => 'Coordinate::buildRange',
            'Cell::columnIndexFromString' => 'Coordinate::columnIndexFromString',
            'Cell::coordinateFromString' => 'Coordinate::coordinateFromString',
            'Cell::extractAllCellReferencesInRange' => 'Coordinate::extractAllCellReferencesInRange',
            'Cell::getRangeBoundaries' => 'Coordinate::getRangeBoundaries',
            'Cell::mergeRangesInCollection' => 'Coordinate::mergeRangesInCollection',
            'Cell::rangeBoundaries' => 'Coordinate::rangeBoundaries',
            'Cell::rangeDimension' => 'Coordinate::rangeDimension',
            'Cell::splitRange' => 'Coordinate::splitRange',
            'Cell::stringFromColumnIndex' => 'Coordinate::stringFromColumnIndex',
        ];

        // Keep '\' prefix for class names
        $prefixedClasses = [];
        foreach ($classes as $key => &$value) {
            $value = str_replace('PhpOffice\\', '\\PhpOffice\\', $value);
            $prefixedClasses['\\' . $key] = $value;
        }
        $mapping = $prefixedClasses + $classes + $methods;

        return $mapping;
    }

    /**
     * Search in all files in given directory.
     *
     * @param string $path
     */
    private function recursiveReplace($path)
    {
        $patterns = [
            '/*.md',
            '/*.txt',
            '/*.TXT',
            '/*.php',
            '/*.phpt',
            '/*.php3',
            '/*.php4',
            '/*.php5',
            '/*.phtml',
        ];

        foreach ($patterns as $pattern) {
            foreach (glob($path . $pattern) as $file) {
                if (strpos($path, '/vendor/') !== false) {
                    echo $file . " skipped\n";

                    continue;
                }
                $original = file_get_contents($file);
                $converted = $this->replace($original);

                if ($original !== $converted) {
                    echo $file . " converted\n";
                    file_put_contents($file, $converted);
                }
            }
        }

        // Do the recursion in subdirectory
        foreach (glob($path . '/*', GLOB_ONLYDIR) as $subpath) {
            if (strpos($subpath, $path . '/') === 0) {
                $this->recursiveReplace($subpath);
            }
        }
    }

    public function migrate()
    {
        $path = realpath(getcwd());
        echo 'This will search and replace recursively in ' . $path . PHP_EOL;
        echo 'You MUST backup your files first, or you risk losing data.' . PHP_EOL;
        echo 'Are you sure ? (y/n)';

        $confirm = fread(STDIN, 1);
        if ($confirm === 'y') {
            $this->recursiveReplace($path);
        }
    }

    /**
     * Migrate the given code from PHPExcel to UltimateSpreadSheet.
     *
     * @param string $original
     *
     * @return string
     */
    public function replace($original)
    {
        $converted = str_replace($this->from, $this->to, $original);

        // The string "PHPExcel" gets special treatment because of how common it might be.
        // This regex requires a word boundary around the string, and it can't be
        // preceded by $ or -> (goal is to filter out cases where a variable is named $PHPExcel or similar)
        $converted = preg_replace('~(?<!\$|->)(\b|\\\\)PHPExcel\b~', '\\' . \PhpOffice\UltimateSpreadSheet\Spreadsheet::class, $converted);

        return $converted;
    }
}
