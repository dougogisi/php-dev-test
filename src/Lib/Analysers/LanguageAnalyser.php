<?php

namespace Src\Lib\Analysers;

use Src\AppResponses\AnalyserResponseInterface;
use Src\AppResponses\ResponseInterface;
use Src\AppResponses\LanguageAnalyserResponse;

class LanguageAnalyser implements AnalyserInterface
{
    const DATATYPE = 'language';

    const TOP_LANGUAGE_KEY = 'topLanguageUsed';

    /**
     * @var ResponseInterface
     */
    protected $data;

    protected $resultArray;

    public function __construct(ResponseInterface $data)
    {
        $this->data = $data;
    }

    /**
     * @return AnalyserResponseInterface
     */
    public function analyse(): AnalyserResponseInterface
    {
        $rawResult = [];

        foreach($this->data->getArray() as $datum) {
            echo $datum['language'] . PHP_EOL;
            $language = isset($datum[self::DATATYPE]) && !empty($datum['language']) ?
                    $datum[self::DATATYPE] :
                    null;

            if (!$language) {
                continue;
            }

            $rawResult[$language] += 1;
        }

        arsort($rawResult);
        $resultArray[self::TOP_LANGUAGE_KEY] = array_key_first($rawResult);

        return new LanguageAnalyserResponse($resultArray);
    }
}