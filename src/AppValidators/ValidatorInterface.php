<?php

namespace Src\AppValidators;

interface ValidatorInterface
{
    public function validate(string $name) : bool;
}
