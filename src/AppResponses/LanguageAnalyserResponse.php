<?php


namespace Src\AppResponses;

use Src\Lib\Analysers\LanguageAnalyser;

/**
 * Class GithubUserResponse
 * @package Src\AppResponses
 */
class LanguageAnalyserResponse implements AnalyserResponseInterface
{
    /**
     * @var array
     */
    protected $result;

    /**
     * LanguageAnalyserResponse constructor.
     * @param array $result
     */
    public function __construct(array $result)
    {
        $this->result = $result;
    }

    /**
     * @return string
     */
    public function getResult(): string
    {
        return $this->result[LanguageAnalyser::TOP_LANGUAGE_KEY];
    }
}
