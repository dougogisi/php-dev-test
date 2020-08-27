<?php

namespace Src\Lib\Clients;

interface ClientInterface
{
    public function fetch(string $path);
}