<?php

namespace Src\Lib\Analysers;

use Src\AppResponses\AnalyserResponseInterface;

/**
 * Interface AnalyserInterface
 * @package Src\Lib\Analyser
 */
interface AnalyserInterface
{
    public function analyse(): AnalyserResponseInterface;
}
