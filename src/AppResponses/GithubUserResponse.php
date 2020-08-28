<?php

namespace Src\AppResponses;

/**
 * Class GithubUserResponse
 * @package Src\AppResponses
 */
class GithubUserResponse implements ResponseInterface
{
    /**
     * @var string
     */
    protected $body;

    /**
     * @var int
     */
    protected $responseCode;

    /**
     * GithubUserResponse constructor.
     * @param string $response
     * @param int $responseCode
     */
    public function __construct(string $response, int $responseCode)
    {
        $this->body = $response;
        $this->responseCode = $responseCode;
    }

    public function getArray(): array
    {
        // TODO: Implement getArray() method.
        return json_decode($this->body, true);
    }

    public function getRawBody(): string
    {
        return $this->body;
    }
}