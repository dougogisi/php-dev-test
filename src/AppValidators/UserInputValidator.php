<?php

namespace Src\AppValidators;

class UserInputValidator implements ValidatorInterface
{
    public function validate(string $name) : bool
    {
        return true;
    }
}
