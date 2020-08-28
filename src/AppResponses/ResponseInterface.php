<?php

namespace Src\AppResponses;

/**
 * Interface ResponseInterface
 * @package Src\AppResponses
 */
interface ResponseInterface
{
    public function getRawBody(): string;
    public function getArray(): array;
}
