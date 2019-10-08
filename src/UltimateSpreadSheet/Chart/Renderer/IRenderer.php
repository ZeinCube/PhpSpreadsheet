<?php

namespace PhpOffice\UltimateSpreadSheet\Chart\Renderer;

use PhpOffice\UltimateSpreadSheet\Chart\Chart;

interface IRenderer
{
    /**
     * IRenderer constructor.
     *
     * @param \PhpOffice\UltimateSpreadSheet\Chart\Chart $chart
     */
    public function __construct(Chart $chart);

    /**
     * Render the chart to given file (or stream).
     *
     * @param string $filename Name of the file render to
     *
     * @return bool true on success
     */
    public function render($filename);
}
